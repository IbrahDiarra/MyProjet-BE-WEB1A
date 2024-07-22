
<?php
    include "connect.php";
        if(isset($_POST['send']) AND $_SERVER["REQUEST_METHOD"] == "POST"){
            
           $time = time();
           $img_nom = $_FILES['image']['name'];
           $tmp_nom = $_FILES['image']['tmp_name'];
           $nouveau_img_nom = $time.$img_nom ;
           $deplacer_img = move_uploaded_file($tmp_nom,"image/".$nouveau_img_nom);

           $matricule=$_POST['matricule']; $nom=$_POST['nom']; $prenom=$_POST['prenom']; $email=$_POST['email']; $mdp1=$_POST['mdp1']; $mdp2=$_POST['mdp2']; $sexe=$_POST['sexe'];
 
           if(isset($email) && isset($mdp1) && isset($matricule)&& isset($nom) && isset($prenom) && isset($mdp1)&& isset($sexe)
              && $email != "" && $mdp1 != "" && isset($mdp2) && $mdp2 != "" && $nom != "" && $prenom != "" && $matricule != "" && $sexe != ""){
               //verifions que les mots de passes sont conforme
               if($mdp2 != $mdp1){
                   // s'ils sont differrent
                   $error = "Les Mots de passes sont différents !";
               }else {
                    
                
                   //si non , verifions si l'email existe
                   $req = mysqli_query($con , "SELECT * FROM etudiant WHERE matricule_et = '$matricule'");
                   if(mysqli_num_rows($req) == 0){
                       //si ça n'existe pas , créons le compte
                       $resultat ="INSERT INTO etudiant (matricule_et, email_et , nom_et , prenom_et , mdp_et , photo_et ,sexe_et) VALUES ('$matricule','$email','$nom','$prenom','$mdp1','$nouveau_img_nom','$sexe')";

                       $req = mysqli_query($con ,$resultat );
                       if($req){
                           // si le compte a été créer , créons une variable pour afficher un message dans la page de
                           //connexion
                           $_SESSION['messagelo'] = "Votre compte a été créer avec succès !" ;
                           //redirection vers la page de connexion
                           echo "<script> window.location.href='index.php?page=login';</script>";
                      
                       }else {
                           //si non
                           $error = "Inscription Echouée !";
                       }
                   }else {
                       //si ça existe
                       $error = "Ce matricule existe déjà !";
                   }

               }
            }
            else {
               $error = "Veuillez remplir tous les champs !" ;
           }
        }
?>
<style>
        .error{
            color:red;
            font-family:"Lobster Two";
            font-size:18px;
        }
</style>
<section class="m-5 ps-5 pt-3 pe-5 pb-5">
                <div class="row pt-5 ps-5 cardss mt-2" >
                    <div class="col-lg-5 bg-light formul" style="border-radius: 20px 0px 0px 20px;">
                        <img src="icon/login.jpg" alt="" class="w-100 h-100">
                    </div>
                    <div class="col-lg-7 bg-light formul" style="border-radius: 0px 20px 20px 0px;" >
                        <div class="p-2">
                            <div class="">
                                <a href="#">
                                    <button class="btn m-2 float-right btn1" style="background:orange;color:black;font-family:Lobster" type="button">S'inscrire</button>
                                </a>
                                <a href="?page=connexion">
                                    <button class="btn m-2 float-end btn1" style="background:rgb(163, 160, 160);;color:black;font-family:Lobster" type="button">Se connecter</button>
                                </a>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="nom">Matricule</label>
                                        <input type="text" class="form-control form-control-user" name="matricule">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control form-control-user" name="nom">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="prenom">Prénom<span class="error"></label>
                                        <input type="text" class="form-control form-control-user" name="prenom">
                                    </div>
                                    <div class="col-sm-6">
                                       <label for="email">Email <span class="error"></label>
                                       <input type="email" class="form-control form-control-user" name="email">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password">Mot de passe </label>
                                        <input type="password" class="form-control form-control-user" name="mdp1">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="confirma">Confirmation</label>
                                        <input type="password" class="form-control form-control-user" name="mdp2">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="sexe" class="control-label">Sexe</label>
                                        <select name="sexe"  class="custom-select form-control selevt">
                                            <option>Masculin</option>
                                            <option>Feminin</option>
                                        </select>
                                    </div>  
                                    <div class="col-sm-6">
                                        <label for="image" class="control-label">Photo</label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class=" col-sm-4">
                                      <input type="submit" value="Valider l'inscription" name="send" class="btn  m-2 btn1" style="background:blue;color:white;font-family:Lobster">
                                    </div>
                                    <div class="col-sm-8">
                                           <?php if(isset($_SESSION['messagelo'])):?>
                                                <div class='toast show'>
                                                    <div class='toast-header text-center'>
                                                        <strong class='me-auto text-dark text-center' style="font-family:'Patua One';"><?php echo $_SESSION['messagelo'] ;?></strong>
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

</section>
<script src="style/script.js"></script>