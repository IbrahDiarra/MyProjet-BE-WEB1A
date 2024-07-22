<?php
    require_once('connect.php');
    $req = mysqli_query($con , "SELECT * FROM etudiant");

    while($row = mysqli_fetch_assoc($req)){
        
        $nom=$row['Nom'];
        $prenom=$row['Prenom'];
        $id_classe=$row['id_classe'];
    }

?>
<section class="page-section">
    <div class="container bg-white" style="border-radius:15px;">
            <div class="row  mt-5">
                <h2 class="text-center text-primary" style="font-family: 'Lobster Two';">Les Moyennes des étudiants</h2><br>
            </div>
        
            <table class="table table-striped mt-3" >
                <colgroup >
					<col width="12%">
                    <col width="23%">
					<col width="20%">
					<col width="10%">
					<col width="15%">
					<col width="15%">
				</colgroup>
                <thead class="bg-info" style="font-family: 'Patua One';" >
                    <tr>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Classe</th>
                        <th>Coeficient</th>
                        <th>Total</th>
                        <th>Moyenne</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $ReadSql5 = "SELECT *FROM `etudiant` ";
                        $res5 = mysqli_query($con, $ReadSql5);

                              while($rb=mysqli_fetch_assoc($res5)){ 
                                   $matricu_et=$rb['Matricule'];
                                   $id_filiere=$rb['id_filiere'];
                                   $id_classe=$rb['id_classe'];
                                    ?>
                                       <?php
                                        $ReadSql = "SELECT *FROM `note` WHERE Matricule_et='$matricu_et' ";
                                        $res = mysqli_query($con, $ReadSql);
                                        $total=0;
                                        $somme_coef=0;
                                        while($r=mysqli_fetch_assoc($res)){
                                            $id_cours=$r['id_cours'];
                                        ?>
                                        <?php 
                                            $resul1 = "SELECT *FROM `cours` ";
                                            //excuter la requette
                                            $res2 = mysqli_query($con, $resul1);
                                            //afficher les questions
                                            while($row2=mysqli_fetch_assoc($res2)){
                                                if($id_cours == $row2['id']): ?>
                                                    
                                                <?php endif; ?>
                                        <?php }?>

                                        <?php 
                                            $resul1 = "SELECT *FROM `cours` ";
                                            //excuter la requette
                                            $res2 = mysqli_query($con, $resul1);
                                            //afficher les questions
                                            while($row2=mysqli_fetch_assoc($res2)){
                                                if($id_cours == $row2['id']): $coefi=$row2['coef']; ?> 
                                                
                                                <?php endif; ?>
                                        <?php }?>
                                
                                        <?php $ponderation = ($r['note'])*$coefi;
                                            $total=$total + $ponderation; 
                                            $somme_coef= $somme_coef +  $coefi;
                                            $moy= $total/$somme_coef;
                                            $moyenne = number_format($moy, 2);
                                            ?>
                                
                                    <?php }?>
                                
                                    <tr>
                                        <th scope="row"><?php echo $rb['Matricule']; ?></th>

                                        <td><?php echo $rb['Nom']; ?> <?php echo $rb['Prenom']; ?></td>
                                        
                                        <td>
                                            <?php 
                                                $classe = "SELECT *FROM `classe` ";
                                                //excuter la requette
                                                $res2 = mysqli_query($con, $classe);

                                                while($row2=mysqli_fetch_assoc($res2)){
                                                    if($id_classe == $row2['id']): ?>
                                                        <span><?=$row2['lib_classe']?></span>
                                                    <?php endif; ?>
                                            <?php }?>
                                        </td>

                                        <td><?php echo $somme_coef; ?></td>
                                        
                                        <td><?php echo $total; ?></td>

                                        <td><?php echo $moyenne; ?></td>
                                    </tr>
                            <?php }?>
                
                        </tbody>
            </table>
        </div>


</section>

                   