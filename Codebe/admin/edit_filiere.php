<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua One">

<?php
    require_once('connect.php');
        $id = $_GET['id'];
        $selSql = "SELECT *FROM `filiere` WHERE id='$id' ";
        $res = mysqli_query($con, $selSql);
        $r=mysqli_fetch_assoc($res);

        if(isset($_POST['envoyer'])){
            

           $libelle=$_POST['libelle'];
 
           if(isset($libelle) && $libelle != "" ){
                       //si ça n'existe pas , créons le compte
                       $resultat ="UPDATE `filiere` SET lib_filiere='$libelle' WHERE id= '$id' ";

                $req = mysqli_query($con ,$resultat );
                if($req){
                    
                    $_SESSION['messagefiliere'] = "La mise à jour effectuée avec succès !" ;
                    //redirection vers la page de connexion
                    echo "<script> window.location.href='index.php?page=voir_filiere';</script>";
                } else {
                    //si non
                    $error = "Mise à jour a échouée !";
                }  
           }
            else{
                $error = "Veuillez remplir tous les champs !" ;
           }
        }
?>


<style>
 .foot{
   font-family: "Lobster Two", sans-serif;
   font-size: 20px;
 }
 label{
    font-family:"Patua One";
 }
 h5{
    font-family:"Patua One";
 }
 .card-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
 }
 .categorie{
    display:flex;
    align-items:center;
    justify-content:center;
    
 }
 .control-label{
    font-family:"Patua One";
    font-size:25px;
 }
 form{
    width: 350px;
    height:220;
    background-color: #ebf6ff;
    border-radius:15px;
    box-shadow: 3px 3px 7px black, -2px -2px 5px black; 
 }
</style>
<section>
    <div class="card card-outline mb-5 card-info">
        <div class="card-header d-flex">
            <h3 class="card-title foot" style="font-size: 25px; color:blue;">Ajout de Filières</h3>
            <?php if(isset($_SESSION['messagefiliere'])):?>
                <div class='toast show'>
                    <div class='toast-header text-center'>
                        <strong class='me-auto text-dark text-center' style="font-family:'Patua One';"><?php echo $_SESSION['messagefiliere'] ;?></strong>
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
            <div>
                <a href="?page=voir_filiere">
                    <button class="btn btn-primary m-2"style="color:white;font-family:Lobster; font-size:15px;" type="button">Retour</button>
                </a>
            </div> 
        </div>
        <div class="card-body">
            <div class="categorie">
                <form action=""  method="POST" enctype="multipart/form-data" class="p-3">
                    <input type="hidden" name ="id" value="">
                    <div class="form-group">
                        <div class="text-center"><label for="libelle" class="control-label">Filière</label></div>
                         <br>
                        <input type="text" name="libelle" class="form-control form no-resize" value="<?php echo $r['lib_filiere']?>">
                    </div>
                    <br>
                    <div class="card-footer text-center">
                            <input type="submit" name="envoyer" value="Sauver" style="border-radius:15px;font-family:Patua One;" class="btn btn-primary" >
                            <input type="reset" value="Annuler" style="border-radius:15px;font-family:Patua One;" class="btn btn-secondary" >
                    </div>
                </form>
           </div>
        </div>
</section>