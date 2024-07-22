<?php 
    //inclure la page de connexion
    require_once('connect.php');
    $id = $_GET['id'];
    $selSql = "SELECT *FROM `cours` WHERE id='$id' ";
    $res = mysqli_query($con, $selSql);
    $r=mysqli_fetch_assoc($res);
    //verifier que les données sont envoyés
    if(isset($_POST['envoyer'])){
        
            $lib = $_POST['libelle'] ; $libe=addslashes($lib);
            $coef = $_POST['coef'] ; $enseignant=$_POST['enseignant'];

            if(isset($lib) && isset($coef) && isset($enseignant)  && $lib != "" && $coef != "" && $enseignant != ""  ){
                // créons la question
                $resultat ="UPDATE `cours` SET lib_cours='$libe', coef='$coef', id_enseignant='$enseignant' WHERE id= '$id' ";

                $req = mysqli_query($con ,$resultat );
                if($req){
                    
                    $_SESSION['messagecours'] = "La mise à jour effectuée avec succès !" ;
                    //redirection vers la page de connexion
                    echo "<script> window.location.href='index.php?page=voir_cours';</script>";
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua One">

<style>
 .foot{
   font-family: "Lobster Two", sans-serif;
   font-size: 20px;
 }
 label{
    font-family:"Patua One";
 }
 .card-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
 }
 form{
    width: 50%;
    height:100%;
    background-color: #ebf6ff;
    border-radius:15px;
    box-shadow: 3px 3px 7px black, -2px -2px 5px black; 
 }
 .categorie{
    display:flex;
    align-items:center;
    justify-content:center;
    
 }
</style>
<section class="page-section">
    <div class="card card-outline mb-5 card-info">
        <div class="card-header d-flex">
            <h3 class="card-title foot" style="font-size: 25px; color:blue;">Création de cours</h3>
            <?php if(isset($_SESSION['messagecours'])):?>
                <div class='toast show'>
                    <div class='toast-header text-center'>
                        <strong class='me-auto text-dark text-center' style="font-family:'Patua One';"><?php echo $_SESSION['messagecours'] ;?></strong>
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
                <a href="?page=voir_cours">
                    <button class="btn btn-primary m-2"style="color:white;font-family:Lobster; font-size:15px;" type="button">Retour</button>
                </a>
            </div> 
        </div>
        <div class="card-body">
           <div class="categorie">
                <form action=""  method="POST" enctype="multipart/form-data" class="p-3">
                    <input type="hidden" name ="id" value="">
                    <div class="form-group row">
                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                            <label for="libelle" class="control-label">Libellé</label>
                        </div>
                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                            <textarea name="libelle" id="libelle" cols="50" rows="2"  class="form-control form no-resize summernote"><?php echo $r['lib_cours']?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                            <label for="coef" class="control-label">Coefficient</label>
                        </div>
                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                             <input type="number" class="form-control form-control-user" name="coef" value="<?php echo $r['coef']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                            <label for="enseignant" class="control-label">Id_enseignant</label>
                        </div>
                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                            <input type="number" class="form-control form-control-user" name="enseignant" value="<?php echo $r['id_enseignant']?>">
                        </div>
                    </div>
                    
                    <br>
                    <div class="card-footer">
                        <input type="submit" name="envoyer" value="Sauver" style="border-radius:15px;" class="btn btn-primary" >
                        <input type="reset" value="Annuler" style="border-radius:15px;" class="btn btn-secondary" >
                    </div>
                </form>
            </div>   
        </div>
</section>
<script>
	$(document).ready(function(){
        $('.summernote').summernote({
		        height: 200,
		        toolbar: [
		            [ 'style', [ 'style' ] ],
		            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
		            [ 'fontname', [ 'fontname' ] ],
		            [ 'fontsize', [ 'fontsize' ] ],
		            [ 'color', [ 'color' ] ],
		            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
		            [ 'table', [ 'table' ] ],
		            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
		        ]
		    })
	})
</script>