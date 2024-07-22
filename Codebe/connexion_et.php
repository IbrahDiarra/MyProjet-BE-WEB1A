
<?php 
       if(isset($_POST['bt_connecter'])){

           include "connect.php";

           extract($_POST);

           if(isset($matricule) && isset($mdp1) && $matricule != "" && $mdp1 != ""){
    
               $req = mysqli_query($con , "SELECT * FROM etudiant WHERE Matricule = '$matricule' AND mdp = '$mdp1'");
               if(mysqli_num_rows($req) > 0){
                  
                            $_SESSION['user'] = $matricule;
                            $user = $_SESSION['user'];
                            echo "<script> window.location.href='index.php';</script>";
                }else {
                  
                   $error = "Matricule ou Mots de passe incorrecte(s) !";
                }

            }else {
            
               $error = "Veuillez remplir tous les champs !" ;
           }   
        }        
?>
<style>
    form{
    width: 80%;
    height:220px;
    background-color: #ebf6ff;
    border-radius:15px;
    box-shadow: 3px 3px 7px black, -2px -2px 5px black; 
 }
</style>
<section class="m-5 ps-5 pt-3 pe-5 pb-5">
                <div class="row pt-5 ps-5 cardss mt-2" >
                    <div class="col-lg-5 bg-light  formul1" style="border-radius: 20px 0px 0px 20px;">
                        <img src="icon/login.jpg" alt="" class="w-100 h-100">
                    </div>
                    <div class="col-lg-7 bg-light formul" style="border-radius: 0px 20px 20px 0px;" >
                        <div class="p-2">
                            <form method="post" action="" class="m-5 p-3">
                                <div class="connecter">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="matricule">Matricule</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-user" name="matricule">
                                        </div>
                                    </div><br><br>
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="password">Mot de passe </label>
                                        </div>
                                        <div class="col-sm-8 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="mdp1">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4 ">
                                            <input type="submit" value="S'identifier" name="bt_connecter" class="btn  m-2 btn1" style="background:blue;color:white;font-family:Lobster">
                                        </div>
                                        <div class="col-sm-8">
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

</section>