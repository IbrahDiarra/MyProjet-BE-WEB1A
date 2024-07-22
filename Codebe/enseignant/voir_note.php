<?php
    require_once('connect.php');
    $ensei = $_SESSION['enseignant'];
    $selSql = "SELECT *FROM `enseignant` WHERE email = '$ensei'";
    $res = mysqli_query($con, $selSql);
    $r=mysqli_fetch_assoc($res);
    $id_enseignant1=$r['id'];
    $sexe=$r['Sexe'];

    $resul1 = "SELECT *FROM `cours` WHERE id_enseignant = '$id_enseignant1'";
    $re = mysqli_query($con, $resul1);

    if($sexe == 'M'){
        $appel="Mr";
    }else{
        $appel="Mme";
    }

?>
<section class="page-section">
        <div class="container bg-white" style="border-radius:15px;">
            <div class="row  mt-5">
                <h4 class="text-center text-primary" style="font-family: 'Lobster Two';">Les notes des etudiants de <span style="font-family:'Patua One'; color:black; "><?php echo $appel;?> <?php echo $r['Nom']?> <?php echo $r['Prenom']?></span></h4><br>
                <div>
                    <a href="?page=ajout_note">
                        <button class="btn btn-primary m-2"style="color:white;font-family:Lobster; font-size:15px;" type="button">Saisir des notes</button>
                    </a>
                </div> 
            </div>

            <table class="table table-striped mt-3" >
                <colgroup >
					<col width="12%">
                    <col width="23%">
					<col width="30%">
					<col width="5%">
					<col width="15%">
					<col width="15%">
				</colgroup>
                <thead style="font-family: 'Patua One';" >
                    <tr>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Cours</th>
                        <th>Note</th>
                        <th>Date évaluation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($r1=mysqli_fetch_assoc($re)){
                            $id_cours1=$r1['id'];
                            $resultat = "SELECT *FROM `note` WHERE id_cours='$id_cours1'";
                            $res4 = mysqli_query($con, $resultat);
                        
                            while($rw=mysqli_fetch_assoc($res4)){
                                $matricule_et=$rw['Matricule_et'];
                                $id_cours=$rw['id_cours'];
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $rw['Matricule_et']; ?></th>
                                    <td>
                                        <?php 
                                            $resul = "SELECT *FROM `etudiant` ";
                                            //excuter la requette
                                            $res1 = mysqli_query($con, $resul);
                                            //afficher les questions
                                            while($row1=mysqli_fetch_assoc($res1)){
                                                if($matricule_et == $row1['Matricule']): ?>
                                                    <span><?=$row1['Nom']?> <?=$row1['Prenom']?></span>
                                                <?php endif; ?>
                                        <?php }?>
                                    </td>
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
                                    <td><?php echo $rw['note']; ?></td>
                                    <td><?php echo $rw['date_eval']; ?></td>
                                    <td>
                                        <div class="d-flex">

                                            <i data-bs-toggle="modal" data-bs-target="#exampleModalet<?php echo $rw['id']; ?>" style="cursor:pointer;">
                                                <span><img src="icon1/edit.svg" alt="" style="width:30px; height:30px;"></span>
                                            </i>
                                            <i data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $rw['id']; ?>" style="cursor:pointer;">
                                                <span><img src="icon1/delete.svg" alt="" style="width:30px; height:30px;"></span>
                                            </i>
                                        </div>
                                        <div class="modal fade" id="exampleModal1<?php echo $rw['id']; ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h3 style="font-family:'Lobster Two';">Attention</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="font-family:'Patua One';">Voulez-vous supprimer cette note?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="delete_note.php?id=<?=$rw['id'];?>">
                                                            <button class="btn btn-danger">Confirmer</button>
                                                        </a>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModalet<?php echo $rw['id']; ?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center">
                                                                <h3 style="font-family:'Lobster Two';">Attention</h3>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p style="font-family:'Patua One';">Voulez-vous editer cette note?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="?page=edit_note&id=<?php echo $rw['id']; ?>">
                                                                    <button class="btn btn-danger">Confirmer</button>
                                                                </a>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </td>
                                </tr>
                        <?php }?>
                    <?php }?>
                </tbody>
            </table>
        </div>


</section>

                   