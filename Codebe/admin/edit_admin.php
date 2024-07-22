<?php
        require_once('connect.php');
        $id=1;
        $selSql = "SELECT *FROM `admins` WHERE id_admin='$id'";
        $res = mysqli_query($con, $selSql);
        $r=mysqli_fetch_assoc($res);
        
        if(isset($_POST['send'])){
            

           $nom=$_POST['nom']; $prenom=$_POST['prenom']; $email=$_POST['email']; $mdp1=$_POST['mdp1']; $mdp2=$_POST['mdp2'];
 
           if(isset($email) && isset($mdp1) && isset($nom) && isset($prenom) && $email != "" && $mdp1 != "" && isset($mdp2) && $mdp2 != "" && $nom != "" && $prenom != ""){
               //verifions que les mots de passes sont conforme
               if($mdp2 != $mdp1){
                   // s'ils sont differrent
                   $error = "Les Mots de passes sont différents !";
               }else {
                       $resultat ="UPDATE `admins` SET email_admin='$email', nom_admin='$nom' , prenom_admin='$prenom' , mdp_admin='$mdp1' WHERE id_admin= '$id' ";

                       $req = mysqli_query($con ,$resultat );
                       if($req){
                           // si le compte a été créer , créons une variable pour afficher un message dans la page de
                           //connexion
                           $_SESSION['messagead'] = "Mise à jour effectuée avec succès !" ;
                           echo "<script> window.location.href='index.php?page=edit_admin';</script>";

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
<style>
    .form-control{
        background-color: #ebf6ff;
        border-radius:15px;
    }
    label{
        color:black;
        font-family: "Patua One";
}
</style>
<section class="page-section">
            <div class="container bg-white mt-3" style="border-radius:15px;">
                <div class="row p-3">
                    <div class=""><h1 class="ibtexte45" style="font-family: 'Lobster';">Mon Profil</h1></div>
                    <div class="col-lg-4 bg-white formul" style="border-radius: 20px 0px 0px 20px;">
                        <img src="icon1/imglogin.jpg" alt="" class="w-100 h-100" style="border-radius: 20px 0px 0px 20px;">
                    </div>
                    <div class="col-lg-8 bg-white formul" style="border-radius: 0px 20px 20px 0px;" >
                        <div class="row p-3">
                            <div class="col-lg-3 bg-white pt-3" >
                                    <span>
                                        <img src="images/admin3.jpg" style="width:150px; height:150px; border-radius:30px; border:2px solid black;">
                                    </span>
                            </div>
                            <div class="col-lg-9 bg-white" style="border-radius: 0px 20px 20px 0px;">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="nom">Nom</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="nom" value="<?php echo $r['nom_admin']?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="prenom">Prenom</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="prenom" value="<?php echo $r['prenom_admin']?>">
                                        </div>
                                    </div>
  
                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <input type="email" class="form-control form-control-user" name="email" value="<?php echo $r['email_admin']?>">
                                        </div>
                                    </div>
  
                                    <div class="form-group row">
                                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                                            <label for="password">Mot de passe</label>
                                        </div>
                                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="mdp1" value="<?php echo $r['mdp_admin']?>">
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

                                    <div class="row mt-3">
                                        <div class=" col-sm-4">
                                            <input type="submit" value="Mise à jour" name="send" class="btn  m-2 btn1" style="background:blue;color:white;font-family:Lobster">
                                        </div>
                                        <div class="col-sm-8">
                                            <?php if(isset($_SESSION['messagead'])):?>
                                                <div class='toast show'>
                                                    <div class='toast-header text-center'>
                                                        <strong class='me-auto text-dark text-center' style="font-family:'Patua One';"><?php echo $_SESSION['messagead'] ;?></strong>
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