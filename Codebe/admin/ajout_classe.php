<?php 
    //inclure la page de connexion
    require_once('connect.php');
    //verifier que les données sont envoyés
    if(isset($_POST['envoyer'])){
        
            $lib = $_POST['libelle'] ; $libe=addslashes($lib);
            $effectif = $_POST['effectif'] ; $filiere=$_POST['filiere'];

            if(isset($lib) && isset($effectif) && isset($filiere)  && $lib != "" && $effectif != "" && $filiere != ""  ){
                // créons la question
                $resultat ="INSERT INTO classe (lib_classe, effectif, id_filiere) VALUES ('$libe','$effectif','$filiere')";

                $req = mysqli_query($con ,$resultat );
                if($req){
                    
                    $messageclasse = "La classe a été ajoutée avec succès !" ;
                } else {
                    //si non
                    $error = "Insertion à échouée !";
                }  
           }
        else{
             $error = "Veuillez remplir tous les champs !" ;
        }
    }
?>
<?php
    $fil = "SELECT *FROM `filiere` ";
    $res1 = mysqli_query($con, $fil);
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
            <h3 class="card-title foot" style="font-size: 25px; color:blue;">Ajout de la classe</h3>
            <?php if(isset($messageclasse)):?>
                <div class='toast show'>
                    <div class='toast-header text-center'>
                        <strong class='me-auto text-dark text-center' style="font-family:'Patua One';"><?php echo $messageclasse ;?></strong>
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
                <a href="?page=voir_classe">
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
                            <textarea name="libelle" id="libelle" cols="50" rows="4"  class="form-control form no-resize summernote"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                            <label for="effectif" class="control-label">Effectif</label>
                        </div>
                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                             <input type="number" class="form-control form-control-user" name="effectif">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="text-center col-sm-3 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                            <label for="enseignant" class="control-label">Filière</label>
                        </div>
                        <div class="col-sm-9 mb-3 mt-2 mb-sm-0">
                            <select name="filiere"  class="custom-select form-control selevt">
                                <?php while($row = mysqli_fetch_assoc($res1)){?>  
                                    <option value="<?=$row['id']?>"><?=$row['lib_filiere']?></option>
                                <?php }?>
                            </select>
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