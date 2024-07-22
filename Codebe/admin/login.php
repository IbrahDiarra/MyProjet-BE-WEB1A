<?php 
       if(isset($_POST['bt_connecter'])){
           //si le formulaire est envoyé
           session_start();
           //se connecter à la base de donnée
           include "connect.php";
           //extraire les infos du formulaire
           extract($_POST);
           //verifions si les champs sont vides
           if(isset($email) && isset($mdp1) && $email != "" && $mdp1 != ""){
               //verifions si les identifiants sont justes
               $req = mysqli_query($con , "SELECT * FROM admins WHERE email_admin = '$email' AND mdp_admin = '$mdp1'");
               if(mysqli_num_rows($req) > 0){
                   //si les ids sont justes
                   $_SESSION['admin'] = $email;
                   $user = $_SESSION['admin'];
                   header("location:index.php");

               }else {
                   //si non
                   $error = "Email ou mots de passe incorrecte(s) !";
               }
           }else {
               //si les champs sont vides
               $error = "Veuillez remplir tous les champs !" ;
           }
       }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster Two">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua One">
    <script src="style/bootstrap.bundle.min.js"></script>
</head>
<style>
    body{
        background: #6666;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .milieu{
        background-image: url(images/admin20.jpg);
        background-repeat: no-repeat;
        width: 500px;
        height:450px;
        box-shadow: 5px 5px 10px #ebf6ff, -2px -2px 5px #ebf6ff;
        border-radius:20px;
        display: flex;
        flex-direction:column;
        justify-content: center;
        align-items: center;
    }
    .champs{
        width: 170px;
        height:180px;
        right:-72px;
        top:-60px;
        position:relative;
        border-radius:15px;
        font-family:"Lobster Two";
        color:black;
    }
    .form-control-user{
        background-color: #ebf6ff;
        border-radius:15px;
    }
    .ibtexte2{
      font-family: "Lobster", sans-serif;
      color:green;
      font-size: 35px;
    }
    .ibtexte3{
      color:orange;
      font-family: "Lobster", sans-serif;
      font-size: 35px;
    }
    .groupe{
        top:-90px;
        position:relative;
    }
    .message_error{
        font-family:"Patua One", sans-serif;
        color: red;
        position:relative;
        top: 30px;
        right:-35px;
    }
</style>
<body >
    <div class="milieu">
       <div class="groupe" style="display:flex; align-items:center; gap:1rem;">
            <span><img src="images/logoecole.jpg" alt="" width="60px" height="60" style="border-radius:20px;"></span>
            <a class="navbar-brand" href="#"><b class="ibtexte2"><span class="ibtexte3">App</span>EPT</b></a>
        </div>
        <div class="champs p-2 bg-light">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col mb-3 mt-2 mb-sm-0">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="Votre email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col mb-3 mt-2 mb-sm-0">
                        <input type="password" class="form-control form-control-user" name="mdp1" placeholder="Votre password">
                    </div>
                </div> 
                <div class="form-group row text-center">
                    <div class="col mb-3 mt-2 mb-sm-0">
                         <input type="submit" value="Se connecter" name="bt_connecter" class="btn  m-2 btn1" style="background:blue;color:white;font-family:Lobster">
                    </div>
                </div>   
            </form>
        </div>
        <div>
            <p class="message_error">
                <?php 
                    //affichons l'erreur
                    if(isset($error)){
                        echo $error ;
                    }
                ?>
            </p>
        </div>
    </div>
</body>
</html>


