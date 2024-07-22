<?php
        include "connect.php";
        $user = $_SESSION['user'];
        $selSql = "SELECT *FROM `etudiant` WHERE Matricule= '$user'";
        $res = mysqli_query($con, $selSql);
        $r=mysqli_fetch_assoc($res);
        
        if(isset($_POST['send'])){
            
           $time = time();
           $img_nom = $_FILES['image']['name'];
           $tmp_nom = $_FILES['image']['tmp_name'];
           $nouveau_img_nom = $time.$img_nom ;
           $deplacer_img = move_uploaded_file($tmp_nom,"image/".$nouveau_img_nom);

           $matricule=$_POST['matricule']; $nom=$_POST['nom']; $prenom=$_POST['prenom']; $date=$_POST['date']; $mdp1=$_POST['mdp1']; $mdp2=$_POST['mdp2']; $sexe=$_POST['sexe'];$filiere=$_POST['filiere'];$classe=$_POST['classe'];
 
           if(isset($date) && isset($mdp1) && isset($filiere) && isset($classe) && isset($matricule)&& isset($nom) && isset($prenom) && isset($mdp1)&& isset($sexe)
              && $date != "" && $mdp1 != "" && isset($mdp2) && $mdp2 != "" && $nom != "" && $prenom != "" && $matricule != "" && $sexe != "" && $filiere != "" && $classe != ""){
               //verifions que les mots de passes sont conforme
               if($mdp2 != $mdp1){
                   // s'ils sont differrent
                   $error = "Les Mots de passes sont différents !";
               }else {
                       $resultat ="UPDATE `etudiant` SET Matricule='$matricule', Date_naissance='$date', Nom='$nom' , Prenom='$prenom' , mdp='$mdp1' , Photo='$nouveau_img_nom' , Sexe='$sexe', id_filiere='$filiere', id_classe='$classe'  WHERE Matricule= '$user' ";

                       $req = mysqli_query($con ,$resultat );
                       if($req){
                           // si le compte a été créer , créons une variable pour afficher un message dans la page de
                           //connexion
                           $_SESSION['message_etcompte'] = "Mise à jour effectuée avec succès !" ;
                           echo "<script> window.location.href='index.php?page=et_compte';</script>";
                           //redirection vers la page de connexion
                       }else {
                           //si non
                           $error = "Mise à jour a Echouée !";
                       }

               }
            }
            else {
               $error = "Veuillez remplir tous les champs !" ;
           }
        }
?>

<?php
    $fil = "SELECT *FROM `filiere` ";
    $res1 = mysqli_query($con, $fil);

    $clas = "SELECT *FROM `classe` ";
    $res2 = mysqli_query($con, $clas);
?>


<style>
    .form-control{
        background-color: #ebf6ff;
        border-radius:15px;
    }
</style>
<section class="page-section pt-4 pb-4">
           <div class="container bg-white mt-3 mb-5" style="border-radius:15px;">
                <div class="row pt-3"  >
                    <div class=""><h1 class="ibtexte45" style="font-family: 'Lobster';">Mon Profil</h1></div>
                    <div class="col-lg-4 bg-white formul" style="border-radius: 20px 0px 0px 20px;">
                        <img src="icon/imglogin.jpg" alt="" class="w-100 h-100" style="border-radius: 20px 0px 0px 20px;">
                    </div>
                    <div class="col-lg-8 bg-white formul" style="border-radius: 0px 20px 20px 0px;" >
                        <div class="row">
                             <div class="col-lg-3 bg-white pt-3" >
                                    <span>
                                        <img src="image/<?=$r['Photo'];?>" style="width:150px; height:150px; border-radius:30px; border:2px solid black;">
                                    </span>
                            </div>
                            <div class="col-lg-9 bg-white" style="border-radius: 0px 20px 20px 0px;">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="matricule">Matricule</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="matricule" value="<?php echo $r['Matricule']?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="nom">Nom</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="nom" value="<?php echo $r['Nom']?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="prenom">Prenom</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="prenom" value="<?php echo $r['Prenom']?>">
                                        </div>
                                    </div>
  
                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="date">Date naissance</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <input type="date" class="form-control form-control-user" name="date" value="<?php echo $r['Date_naissance']?>">
                                        </div>
                                    </div>
       
                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="sexe">Sexe</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <select name="sexe"  class="custom-select form-control selevt">
                                                <option <?php if($r['Sexe']=='M'){echo "selected";} ?>>M</option>
                                                <option <?php if($r['Sexe']=='F'){echo "selected";} ?>>F</option>
                                            </select>
                                        </div>
                                    </div>
  
                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="password">Mot de passe</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="mdp1" value="<?php echo $r['mdp']?>">
                                        </div>
                                    </div>
      
                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="confirma">Confirmation</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="mdp2">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="filiere">Filiere</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <select name="filiere" id="" class="custom-select form-control selevt">
                                                <?php while($row = mysqli_fetch_assoc($res1)){?>  
                                                    <option value="<?=$row['id']?>" <?php if($r['id_filiere']==$row['id']){echo "selected";} ?> ><?=$row['lib_filiere']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
      
                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="classe">Classe</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <select name="classe" id="" class="custom-select form-control selevt">
                                                <?php while($row1 = mysqli_fetch_assoc($res2)){?>  
                                                    <option value="<?=$row1['id']?>" <?php if($r['id_classe']==$row1['id']){echo "selected";} ?> ><?=$row1['lib_classe']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="image">Changer Photo</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class=" col-sm-4 Ok ">
                                        <input type="submit" value="Mise à jour" name="send" class="btn  m-2 btn1" style="background:blue;color:white;font-family:Lobster">
                                        </div>
                                        <div class="col-sm-8">
                                            <?php if(isset($_SESSION['message_etcompte'])):?>
                                                <div class='toast show'>
                                                    <div class='toast-header text-center'>
                                                        <strong class='me-auto text-dark text-center' style="font-family:'Patua One';"><?php echo $_SESSION['message_etcompte'] ;?></strong>
                                                        <button type='button' class='btn-close' data-bs-dismiss='toast'></button>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <p></p>
                                            <?php endif; ?>

                                            <?php if(isset($error)): ?>
                                                    <div class='toast show'>
                                                        <div class='toast-header text-center'>
                                                            <strong class='me-auto text-danger text-center' style="font-family:'Patua One';"><?php echo $error ;?></strong>
                                                            <button type='button' class='btn-close' data-bs-dismiss='toast'></button>
                                                        </div>
                                                    </div>
                                            <?php endif; ?>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<script src="style/script.js"></script>