
<?php
    include "connect.php";
        if(isset($_POST['send']) AND $_SERVER["REQUEST_METHOD"] == "POST"){
            
           $time = time();
           $img_nom = $_FILES['image']['name'];
           $tmp_nom = $_FILES['image']['tmp_name'];
           $nouveau_img_nom = $time.$img_nom ;
           $deplacer_img = move_uploaded_file($tmp_nom,"../image/".$nouveau_img_nom);

           $matricule=$_POST['matricule']; $nom=$_POST['nom']; $prenom=$_POST['prenom']; $date=$_POST['date']; $mdp1=$_POST['mdp1']; $mdp2=$_POST['mdp2']; $sexe=$_POST['sexe'];$filiere=$_POST['filiere'];$classe=$_POST['classe'];
 
           if(isset($date) && isset($mdp1) && isset($filiere) && isset($classe) && isset($matricule)&& isset($nom) && isset($prenom) && isset($mdp1)&& isset($sexe)
              && $date != "" && $mdp1 != "" && isset($mdp2) && $mdp2 != "" && $nom != "" && $prenom != "" && $matricule != "" && $sexe != "" && $filiere != "" && $classe != ""){
               //verifions que les mots de passes sont conforme
               if($mdp2 != $mdp1){
                   // s'ils sont differrent
                   $error = "Les Mots de passes sont différents !";
               }else {
                    
                
                   //si non , verifions si l'email existe
                   $req = mysqli_query($con , "SELECT * FROM etudiant WHERE Matricule = '$matricule'");
                   if(mysqli_num_rows($req) == 0){
                       //si ça n'existe pas , créons le compte
                       $resultat ="INSERT INTO etudiant (Matricule, Nom, Prenom , mdp, Sexe, id_filiere, id_classe, Date_naissance, Photo) VALUES ('$matricule','$nom','$prenom','$mdp1','$sexe','$filiere','$classe','$date','$nouveau_img_nom')";

                       $req = mysqli_query($con ,$resultat );
                       if($req){
                           // si le compte a été créer , créons une variable pour afficher un message dans la page de
                           //connexion
                           $messagelo="L'étudiant à été ajouté avec succès !" ;
                           //redirection vers la page de connexion
                     
                      
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
<?php
    $fil = "SELECT *FROM `filiere` ";
    $res1 = mysqli_query($con, $fil);

    $clas = "SELECT *FROM `classe` ";
    $res2 = mysqli_query($con, $clas);
?>
<style>
        .error{
            color:red;
            font-family:"Lobster Two";
            font-size:18px;
        }
        label{
            font-family:"Patua One";
        }
</style>
<section class="page-section">
                <div class="row pt-3 ps-3 pe-3 cardss mt-2" >
                    <div class="col-lg-5 bg-light formul" style="border-radius: 20px 0px 0px 20px;">
                        <img src="../icon/login.jpg" alt="" class="w-100 h-100">
                    </div>
                    <div class="col-lg-7 bg-light formul" style="border-radius: 0px 20px 20px 0px;" >
                        <div class="p-2">
                            <form method="post" action="" enctype="multipart/form-data">
                               <div class="form-group row">
                                           <?php if(isset ($messagelo)):?>
                                                <div class='toast show'>
                                                    <div class='toast-header text-center'>
                                                        <strong class='me-auto text-dark text-center' style="font-family:'Patua One';"><?php echo $messagelo ;?></strong>
                                                        <button type='button' class='btn-close' data-bs-dismiss='toast'></button>
                                                    </div>
                                                </div>
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
                                <div class="form-group row pt-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="nom">Matricule</label>
                                        <input type="text" class="form-control form-control-user" name="matricule">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control form-control-user" name="nom">
                                    </div>
                                </div>
                              
                                <div class="form-group row pt-1">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="prenom">Prénom<span class="error"></label>
                                        <input type="text" class="form-control form-control-user" name="prenom">
                                    </div>
                                    <div class="col-sm-6">
                                       <label for="date">Date naissance <span class="error"></label>
                                       <input type="date" class="form-control form-control-user" name="date">
                                    </div>
                                </div>
                          
                                <div class="form-group row pt-1">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password">Mot de passe </label>
                                        <input type="password" class="form-control form-control-user" name="mdp1">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="confirma">Confirmation mdp</label>
                                        <input type="password" class="form-control form-control-user" name="mdp2">
                                    </div>
                                </div>
                         
                                <div class="form-group row pt-1">
                                    <div class="col-sm-6">
                                        <label for="sexe" class="control-label">Sexe</label>
                                        <select name="sexe"  class="custom-select form-control selevt">
                                            <option>M</option>
                                            <option>F</option>
                                        </select>
                                    </div>  
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="filiere">Filiere</label>
                                        <select name="filiere"  class="custom-select form-control selevt">
                                            <?php while($row = mysqli_fetch_assoc($res1)){?>  
                                                <option value="<?=$row['id']?>"><?=$row['lib_filiere']?></option>
                                            <?php }?>
                                        </select>
                                    </div>  
                                </div>
                              
                                <div class="form-group row pt-1">
                                   <div class="col-sm-6">
                                        <label for="classe">Classe</label>
                                        <select name="classe"  class="custom-select form-control selevt">
                                            <?php while($row1 = mysqli_fetch_assoc($res2)){?>
                                                <option value="<?=$row1['id']?>"><?=$row1['lib_classe']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                     <div class="col-sm-6">
                                        <label for="image" class="control-label">Photo</label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row pt-2">
                                    <div class=" col-sm-4">
                                      <input type="submit" value="Valider" name="send" class="btn  m-2 btn1" style="background:blue;color:white;font-family:Lobster">
                                    </div>
                                    <div class="col-sm-8">
                                        <a href="?page=voir_etudiant">
                                            <button class="btn bg-primary m-2  btn1" style="color:black;font-family:Lobster;" type="button">Retour</button>
                                        </a> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

</section>
<script src="style/script.js"></script>