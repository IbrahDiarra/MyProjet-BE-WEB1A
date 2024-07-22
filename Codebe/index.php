<?php require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ib Dashbord</title>
        <link rel="stylesheet"  href="style/stylee.css">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
        <script src="style/bootstrap.bundle.min.js"></script>
    </head>
    <body >
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'accueil';  ?>
        <?php require_once('code/navbar.php') ?>
        <?php 
            if(!file_exists($page.".php") && !is_dir($page)){
                include '404.html';
            }else{
            if(is_dir($page))
                include $page.'index.php';
            else
                include $page.'.php';
            }
        ?>
        <?php include 'code/footer.php'; ?>
        
<div class="modal fade" id="exampleModalet" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 style="font-family:'Lobster Two';">Confirmation</h3>
      </div>
      <div class="modal-body">
        <p style="font-family:'Patua One';">Vous pouvez accerder à votre menu!!</p>
      </div>
      <div class="modal-footer">
        <a href="./etudiant/index.php">
          <button class="btn btn-warning">Suivant</button>
        </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalensei" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 style="font-family:'Lobster Two';">Confirmation</h3>
      </div>
      <div class="modal-body">
        <p style="font-family:'Patua One';">Vous pouvez accerder à votre menu!!</p>
      </div>
      <div class="modal-footer">
        <a href="./enseignant/index.php">
          <button class="btn btn-info">Suivant</button>
        </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 style="font-family:'Lobster Two';">Information</h3>
      </div>
      <div class="modal-body">
        <p style="font-family:'Patua One';">Vous devez vous connecter pour acceder à votre menu!!</p>
      </div>
      <div class="modal-footer">
        <a href="?page=connexion_ensei">
          <button class="btn btn-primary">Enseignant</button>
        </a>
        <a href="?page=connexion_et">
          <button class="btn btn-info">Etudiant</button>
        </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalverification" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 style="font-family:'Lobster Two';">Information pour se connecter</h3>
      </div>
      <div class="modal-body">
        <p style="font-family:'Patua One';">Etes vous étudiant(e) ou enseignant?</p>
      </div>
      <div class="modal-footer">
        <a href="?page=connexion_ensei">
          <button class="btn btn-primary">Enseignant</button>
        </a>
        <a href="?page=connexion_et">
          <button class="btn btn-info">Etudiant(e)</button>
        </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
    </body>
</html>
