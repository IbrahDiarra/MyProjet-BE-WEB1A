<?php
    require_once('connect.php');
    if(isset($_POST['envoyer'])){
        
        $filiere=$_POST['filiere'];
      
       if(isset($filiere) && $filiere != "" ){
            $_SESSION['filiere'] = $filiere;
            echo "<script> window.location.href='index.php?page=moyenne_filiere';</script>";
        }
        else {
           $error = "Veuillez remplir les champs !" ;
       }
    }

    $reqa = mysqli_query($con , "SELECT * FROM etudiant");
    while($rowa = mysqli_fetch_assoc($reqa)){
        
        $nom=$rowa['Nom'];
        $prenom=$rowa['Prenom'];
        $id_classe=$rowa['id_classe'];
    }
?>
<?php
    $fil = "SELECT *FROM `filiere` ";
    $res1 = mysqli_query($con, $fil);

    $clas = "SELECT *FROM `classe` ";
    $res2 = mysqli_query($con, $clas);
?>

<style>
    form{
        width: 50%;
        background-color: #ebf6ff;
        border-radius:15px;
        box-shadow: 3px 3px 7px black, -2px -2px 5px black; 
 }
</style>

<section class="page-section pt-3">
        <div class="container bg-white pt-4" style="border-radius:15px;">
           <div class="categorie pt-3 text-center">
                <form action=""  method="POST" enctype="multipart/form-data" class="p-3">
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                             <span style="font-family:'Patua One';">La filière</span>
                        </div>
                        <div class="col-sm-4 mb-3 mt-2 mb-sm-0">
                            <select name="filiere"  class="custom-select form-control selevt">
                               <?php while($row = mysqli_fetch_assoc($res1)){?>  
                                    <option value="<?=$row['id']?>"><?=$row['lib_filiere']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-sm-4 mb-3 mt-2 mb-sm-0">
                              <input type="submit" name="envoyer" value="Moyenne" style="border-radius:15px;font-family:Patua One;" class="btn btn-primary" >
                        </div>
                    </div>
                    <?php if(isset($error)): ?>
                        <div class="pe-5">
                            <div class='toast show'>
                                <div class='toast-header text-center'>
                                    <strong class='me-auto text-danger text-center' style="font-family:'Patua One';"><?php echo $error ;?></strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='toast'></button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </form>
           </div>

           <?php if(isset($_SESSION['filiere'])): $filiere_etudiant = $_SESSION['filiere'];?>
                <div class="pt-5 p-3">
                    <span style="font-family:'Patua One';">Détails des moyennes de classe de la filière <span style="font-family:'Patua One';color:blue;">
                    <?php 
                                                $filiere = "SELECT *FROM `filiere` ";
                                                //excuter la requette
                                                $res1 = mysqli_query($con, $filiere);

                                                while($row1=mysqli_fetch_assoc($res1)){
                                                    if($filiere_etudiant == $row1['id']): ?>
                                                        <span><?=$row1['lib_filiere']?></span>
                                                    <?php endif; ?>
                                            <?php }?>
                  </span> </span>
                </div>

                <div>
                        <?php 
                            $ReadSql5 = "SELECT *FROM `etudiant` WHERE id_filiere='$filiere_etudiant' ";
                            $res5 = mysqli_query($con, $ReadSql5);
                               
                                if(mysqli_num_rows($res5) == 0){
                                    $moy2=0;
                                    $somme_moy=0;
                                }else{
                                    $nbre=0;
                                    $somme_moy=0;
                                    while($rb=mysqli_fetch_assoc($res5)){ 
                                        $matricu_et=$rb['Matricule'];
                                        $id_filiere=$rb['id_filiere'];
                                        $id_classe=$rb['id_classe'];
                                            ?>
                                            <?php
                                                $ReadSql = "SELECT *FROM `note` WHERE Matricule_et='$matricu_et' ";
                                                $res = mysqli_query($con, $ReadSql);
                                                $total=0;
                                                $somme_coef=0;
                                                while($r=mysqli_fetch_assoc($res)){
                                                    $id_cours=$r['id_cours'];
                                                ?>
                                                <?php 
                                                    $resul1 = "SELECT *FROM `cours` ";
                                                    //excuter la requette
                                                    $res2 = mysqli_query($con, $resul1);
                                                    //afficher les questions
                                                    while($row2=mysqli_fetch_assoc($res2)){
                                                        if($id_cours == $row2['id']): ?>
                                                            
                                                        <?php endif; ?>
                                                <?php }?>

                                                <?php 
                                                    $resul1 = "SELECT *FROM `cours` ";
                                                    //excuter la requette
                                                    $res2 = mysqli_query($con, $resul1);
                                                    //afficher les questions
                                                    while($row2=mysqli_fetch_assoc($res2)){
                                                        if($id_cours == $row2['id']): $coefi=$row2['coef']; ?> 
                                                        
                                                        <?php endif; ?>
                                                <?php }?>
                                        
                                                <?php $ponderation = ($r['note'])*$coefi;
                                                    $total=$total + $ponderation; 
                                                    
                                                    $somme_coef= $somme_coef +  $coefi;
                                                    $moy= $total/$somme_coef;
                                                    $moyenne = number_format($moy, 2);
                                                    ?>
                                        
                                            <?php }?>
                                    
                                            <?php $somme_moy= $somme_moy + $moyenne;
                                                   $nbre = $nbre + 1 ;
                                                   $moy1= $somme_moy/$nbre;
                                                   $moy2= number_format($moy1, 2);
                                            ?> 
                                         
                            <?php } }?>
                       

                    </div>
 
                <div class="p-3" style="display:flex; justify-content:space-between;">
                     <span style="font-family:'Patua One'; color:blue;">Total : <?php echo $somme_moy; ?></span>
                     <span style="font-family:'Patua One'; color:orange;">Moyenne : <?php echo $moy2; ?></span>
                </div>
            <?php endif; ?>
        </div>


</section>