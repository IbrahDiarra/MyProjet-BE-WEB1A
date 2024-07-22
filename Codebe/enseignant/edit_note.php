<?php 
    //inclure la page de connexion
    require_once('connect.php');
        $id = $_GET['id'];
        $selSql = "SELECT *FROM `note` WHERE id='$id' ";
        $res = mysqli_query($con, $selSql);
        $r=mysqli_fetch_assoc($res);

        $ensei = $_SESSION['enseignant'];
        $selSql5 = "SELECT *FROM `enseignant` WHERE email = '$ensei'";
        $res5 = mysqli_query($con, $selSql5);
        $r5=mysqli_fetch_assoc($res5);
        $id_enseignant1=$r5['id'];

    $resul1 = "SELECT *FROM `cours` WHERE id_enseignant = '$id_enseignant1'";
    $re = mysqli_query($con, $resul1);
    //verifier que les données sont envoyés
    if(isset($_POST['envoyer'])){
        
   
            $cours = $_POST['cours'] ; $etudiant=$_POST['matricule']; $note=$_POST['note']; $date=$_POST['date'];

            if(isset($cours) && isset($etudiant) && isset($note) && isset($date)  && $cours != "" && $etudiant != "" && $note != "" && $date != ""  ){
                

                while($r1=mysqli_fetch_assoc($re)){
                    $id_cours1=$r1['id'];

                    if($cours == $id_cours1 ){

                        $resultat ="UPDATE `note` SET id_cours='$cours', Matricule_et='$etudiant', note='$note', date_eval='$date' WHERE id= '$id' ";
                        $req = mysqli_query($con ,$resultat );
                        if($req){
                            
                            //redirection vers la page de connexion
                            echo "<script> window.location.href='index.php?page=voir_note';</script>";
                        } else {
                            //si non
                            $error = "Mise à jour a échouée !";
                        } 
                    }else{
                        $error ="Vous ne pouvez pas saisir des notes pour ce cours";
                    }
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
           <h3 class="card-title foot" style="font-size: 25px; color:blue;">Mise à jour</h3>

            <?php if(isset($error)): ?>
                <div class='toast show'>
                    <div class='toast-header text-center'>
                        <strong class='me-auto text-danger text-center' style="font-family:'Patua One';"><?php echo $error ;?></strong>
                        <button type='button' class='btn-close' data-bs-dismiss='toast'></button>
                    </div>
                </div>
            <?php endif; ?>
            <div>
                <a href="?page=voir_note">
                    <button class="btn btn-primary m-2"style="color:white;font-family:Lobster; font-size:15px;" type="button">Retour</button>
                </a>
            </div> 
        </div>
        <div class="card-body">
           <div class="categorie">
                <form action=""  method="POST" enctype="multipart/form-data" class="p-3">
                    <input type="hidden" name ="id" value="">
                    <div class="form-group row">
                        <div class="text-center col-sm-5 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                            <label for="cours" class="control-label">Id_cours</label>
                        </div>
                        <div class="col-sm-7 mb-3 mt-2 mb-sm-0">
                            <input type="number" class="form-control form-control-user" name="cours" value="<?php echo $r['id_cours']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="text-center col-sm-5 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                            <label for="matricule" class="control-label">Matricule etudiant</label>
                        </div>
                        <div class="col-sm-7 mb-3 mt-2 mb-sm-0">
                             <input type="text" class="form-control form-control-user" name="matricule" value="<?php echo $r['Matricule_et']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="text-center col-sm-5 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                            <label for="note" class="control-label">Note</label>
                        </div>
                        <div class="col-sm-7 mb-3 mt-2 mb-sm-0">
                             <input type="number" step="0.01" class="form-control form-control-user" name="note" value="<?php echo $r['note']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="text-center col-sm-5 mb-3 mt-2 mb-sm-0 d-flex align-items-center">
                            <label for="date" class="control-label">Date evaluation</label>
                        </div>
                        <div class="col-sm-7 mb-3 mt-2 mb-sm-0">
                             <input type="date" class="form-control form-control-user" name="date" value="<?php echo $r['date_eval']?>">
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