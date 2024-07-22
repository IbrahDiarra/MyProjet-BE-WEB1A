<?php
    require_once('connect.php');
    if(isset($_POST['envoyer'])){
        
        $matricule=$_POST['matricule'];
      
       if(isset($matricule) && $matricule != "" ){
            $_SESSION['Matricule'] = $matricule;
            echo "<script> window.location.href='index.php?page=moyenne';</script>";
        }
        else {
           $error = "Veuillez remplir les champs !" ;
       }
    }
?>
<style>
    form{
        width: 80%;
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
                        <div class="col-sm-4 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                             <span style="font-family:'Patua One';">Le matricule de l'étudiant(e)</span>
                        </div>
                        <div class="col-sm-4 mb-3 mt-2 mb-sm-0">
                             <input type="text" class="form-control form-control-user" name="matricule" >
                        </div>
                        <div class="col-sm-2 mb-3 mt-2 mb-sm-0">
                              <input type="submit" name="envoyer" value="Moyenne" style="border-radius:15px;font-family:Patua One;" class="btn btn-primary" >
                        </div>
                        <div class="col-sm-2 mb-3 mt-2 mb-sm-0">
                            <a href="bulletin.php" target="_blank">
                                 <button class="btn btn-primary" style="color:white;font-family:Patua One;border-radius:15px;" type="button">Bulletin</button>
                            </a>
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
           <?php if(isset($_SESSION['Matricule'])): $etudiant = $_SESSION['Matricule'];?>
                <div class="pt-5 p-3">
                   <?php
                        $ReadSql2 = "SELECT *FROM `etudiant` WHERE Matricule='$etudiant' ";
                        $res = mysqli_query($con, $ReadSql2);
                        $rowet=mysqli_fetch_assoc($res);
                    ?>
                    <span style="font-family:'Patua One';">Détails des moyennes de l'étudiant(e) <span style="font-family:'Patua One';color:blue;"><?php echo $rowet['Nom']?> <?php echo $rowet['Prenom']?></span> </span>
                </div>
                <table class="table table-striped mt-2" >
                    <colgroup >
                        <col width="30%">
                        <col width="10%">
                        <col width="8%">
                        <col width="15%">
                    </colgroup>
                    <thead class="bg-info" style="font-family: 'Patua One';" >
                        <tr>
                            <th>Cours</th>
                            <th>Note</th>
                            <th>Coef</th>
                            <th>Pondération</th>
                        </tr>
                    </thead>
                    <tbody> 
                    <?php
                        $ReadSql = "SELECT *FROM `note` WHERE Matricule_et='$etudiant' ORDER BY date_eval desc";
                        $res = mysqli_query($con, $ReadSql);
                          $total=0;
                          $somme_coef=0;
                          while($r=mysqli_fetch_assoc($res)){
                               $id_cours=$r['id_cours'];
                               
                            ?>
                            <tr>
                                <td>
                                    <?php 
                                        $resul1 = "SELECT *FROM `cours` ";
                                        //excuter la requette
                                        $res2 = mysqli_query($con, $resul1);
                                        //afficher les questions
                                        while($row2=mysqli_fetch_assoc($res2)){
                                            if($id_cours == $row2['id']): ?>
                                                <span><?=$row2['lib_cours']?></span>
                                            <?php endif; ?>
                                    <?php }?>
                                </td>
                                <td><?php echo $r['note']; ?></td>
                                <td>
                                    <?php 
                                        $resul1 = "SELECT *FROM `cours` ";
                                        //excuter la requette
                                        $res2 = mysqli_query($con, $resul1);
                                        //afficher les questions
                                        while($row2=mysqli_fetch_assoc($res2)){
                                            if($id_cours == $row2['id']): $coefi=$row2['coef']; ?> 
                                                <span><?=$row2['coef']?></span>
                                            <?php endif; ?>
                                    <?php }?>
                                </td>
                                <td><?php $ponderation = ($r['note'])*$coefi;
                                          $total=$total + $ponderation; 
                                          $somme_coef= $somme_coef +  $coefi;
                                          $moy= $total/$somme_coef;
                                          $moyenne = number_format($moy, 2);
                                          echo $ponderation; ?>
                                </td>
                            </tr>
                     <?php }?>
                    </tbody>
                </table>
                <div class="p-3" style="display:flex; justify-content:space-between;">
                     <span style="font-family:'Patua One'; color:blue;">Total : <?php echo $total; ?></span>
                     <span style="font-family:'Patua One'; color:orange;">Moyenne : <?php echo $moyenne; ?></span>
                </div>
            <?php endif; ?>
        </div>


</section>

                   