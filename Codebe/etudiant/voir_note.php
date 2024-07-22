<?php
    require_once('connect.php');
    $user = $_SESSION['user'];
?>
<section class="page-section">
        <div class="container bg-white" style="border-radius:15px;">
            <div class="row  mt-5">
                <h2 class="text-center text-primary" style="font-family: 'Lobster Two';">Mes différentes notes</h2><br>
            </div>

            <table class="table table-striped mt-3" >
                <colgroup >
					<col width="12%">
                    <col width="23%">
					<col width="5%">
					<col width="15%">
				</colgroup>
                <thead style="font-family: 'Patua One';" >
                    <tr>
                        <th>Matricule</th>
                        <th>Cours</th>
                        <th>Note</th>
                        <th>Date évaluation</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $ReadSql = "SELECT *FROM `note` WHERE Matricule_et ='$user' ORDER BY date_eval desc";
                        $res = mysqli_query($con, $ReadSql);

                          while($r=mysqli_fetch_assoc($res)){
                               $id_cours=$r['id_cours'];
                            ?>
                            <tr>
                                <th scope="row"><?php echo $r['Matricule_et']; ?></th>
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
                                <td><?php echo $r['date_eval']; ?></td>
                            </tr>
                     <?php }?>
                </tbody>
            </table>
        </div>


</section>

                   