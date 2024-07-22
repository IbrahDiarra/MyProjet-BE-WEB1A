<?php
    session_start();
    require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster Two">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua One">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <script src="style/bootstrap.bundle.min.js"></script>
    <title>Bulletin</title>
</head>
<style>
    body{
        font-family: 'Times New Roman';
    }
</style>
<body>
            <div id="element" class="row m-5" style="border:1px solid black;">
                <?php if(isset($_SESSION['Matricule'])): $etudiant = $_SESSION['Matricule'];?>
                    <?php
                            $ReadSql2 = "SELECT *FROM `etudiant` WHERE Matricule='$etudiant' ";
                            $res = mysqli_query($con, $ReadSql2);
                            $rowet=mysqli_fetch_assoc($res);
                        ?>
                    <div class="col-sm-4">
                        <div class="pt-3 ">
                            <div class="text-center"><span class="pt-5"><img src="../image/<?=$rowet['Photo'];?>" style="width:100px; height:100px; border-radius:10px; border:1px solid white;"></span></div>
                            <div class="pt-3">
                                <span >Nom: </span ><span style="font-family:Patua One;"><?php echo $rowet['Nom']?></span><br>
                                <span >Prenom: </span ><span style="font-family:Patua One;"><?php echo $rowet['Prenom']?></span><br>
                                <span >Matricule: </span ><span style="font-family:Patua One;"><?php echo $etudiant;?></span><br>
                                <span >Classe: </span ><span style="font-family:Patua One;">
                                <?php $id_classe=$rowet['id_classe']; 
                                $classe = "SELECT *FROM `classe` ";
                                //excuter la requette
                                $res2 = mysqli_query($con, $classe);

                                while($row2=mysqli_fetch_assoc($res2)){
                                    if($id_classe == $row2['id']): ?>
                                        <?=$row2['lib_classe']?>
                                    <?php endif; ?>
                                <?php }?>
                                </span></h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="text-center pt-2"><h3><span style="font-family:'Lobster Two'">Bulletin de Notes</span></h3></div>
                        <div class="mt-5" style="display:flex; justify-content:space-between; align-items:center;">
                            <div><img src="../images/logo_inp.jpg" alt="" style="width:70px;height:70px;"></div>
                            <div>
                                <span style="font-family:Patua One;">Ecole:</span> ESI<br>
                                <span style="font-family:Patua One;">Année Scolaire:</span> 2022-2023<br>
                            </div>
                        </div><br>
                        <table class="table table-striped mt-2" >
                            <colgroup >
                                <col width="30%">
                                <col width="10%">
                                <col width="8%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                                <tr style="background-color:rgb(250, 206, 250);">
                                    <th>Matière</th>
                                    <th>Note</th>
                                    <th>Coef</th>
                                    <th>Pondération</th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                                $ReadSql = "SELECT *FROM `note` WHERE Matricule_et='$etudiant' ORDER BY date_eval desc";
                                $res = mysqli_query($con, $ReadSql);
                                $somme_note=0;
                                $total=0;
                                $somme_coef=0;
                                while($r=mysqli_fetch_assoc($res)){
                                    $id_cours=$r['id_cours'];
                                    
                                    ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                $resul1 = "SELECT *FROM `cours` ";
                                                //excuter la requette
                                                $res2 = mysqli_query($con, $resul1);
                                                //afficher les questions
                                                while($row2=mysqli_fetch_assoc($res2)){
                                                    if($id_cours == $row2['id']): ?>
                                                        <span><?=$row2['lib_cours']?></span>
                                                    <?php endif; ?>
                                            <?php }?>
                                        </td>
                                        <td><?php echo $r['note']; ?></td>
                                        <td>
                                            <?php 
                                                $resul1 = "SELECT *FROM `cours` ";
                                                //excuter la requette
                                                $res2 = mysqli_query($con, $resul1);
                                                //afficher les questions
                                                while($row2=mysqli_fetch_assoc($res2)){
                                                    if($id_cours == $row2['id']): $coefi=$row2['coef']; ?> 
                                                        <span><?=$row2['coef']?></span>
                                                    <?php endif; ?>
                                            <?php }?>
                                        </td>
                                        <td><?php $ponderation = ($r['note'])*$coefi;
                                                $somme_note=$somme_note + ($r['note']);
                                                $total=$total + $ponderation; 
                                                $somme_coef= $somme_coef +  $coefi;
                                                $moy= $total/$somme_coef;
                                                $moyenne = number_format($moy, 2);
                                                echo $ponderation; ?>
                                        </td>
                                    </tr>
                            <?php }?>
                               <tr><td></td><td></td><td></td><td></td></tr>
                               <tr>
                                    <td><span style="font-family:'Patua One'; color:blue;">Totaux</span></td>
                                    <td><?php echo $somme_note; ?></td>
                                    <td><?php echo $somme_coef; ?></td>
                                    <td><?php echo $total; ?></td>
                                </tr>
                                <tr>
                                    <td><span style="font-family:'Patua One'; color:orange;">Moyenne</span></td>
                                    <td></td>
                                    <td></td>
                                    <td><span style="font-family:'Patua One'; color:orange;"><?php echo $moyenne; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <br>
                        <div >
                            <div class="text-center p-3"><span class="p-3" style="font-family:Patua One;">DECISION DE CONSEIL DE CLASSE</span></div>
                        </div>
                         <br>
                        <div>
                            <div><span style="font-family:'Times New Roman';">Le Directeur</span></div><br>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

</body>
<script>
   var element = document.getElementById("element");

   html2pdf(element)
</script>
</html>