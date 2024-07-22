<section class="page-section">
<?php
        require_once('connect.php');
        $selSql = "SELECT *FROM `historique`";
        $res = mysqli_query($con, $selSql);
?>


        <div class="container bg-white" style="border-radius:15px;">
           <div class="row  mt-5">
                <h2 class="text-center text-primary titre" style="font-family: 'Lobster Two';">Historique des tests</h2><br>
           </div>

            <table class="table table-striped mt-3" >
                <colgroup >
					<col width="8%">
					<col width="14%">
					<col width="19%">
					<col width="12%">
					<col width="12%">
                    <col width="20%">
                    <col width="15%">
				</colgroup>
                <thead style="font-family: 'Patua One';" >
                    <tr>
                        <th>N°</th>
                        <th>Matricule</th>
                        <th>Niveau</th>
                        <th>Note</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($rw=mysqli_fetch_assoc($res)){ ?>

                        <tr>
                            <th scope="row"><?php echo $rw['id']; ?></th>
                            <th><?php echo $rw['Matricule']; ?></th>
                            <td>
                                <div class="d-flex align-items-center">
                                    <?php if($rw['Niveau'] == 1): ?>
                                        <span>Amateur PHP</span>
                                    <?php elseif($rw['Niveau'] == 2): ?>
                                        <span>Animateur PHP</span>
                                    <?php elseif($rw['Niveau'] == 3): ?>
                                        <span>Développeur Web D01</span>
                                    <?php elseif($rw['Niveau'] == 4): ?>
                                        <span>Développeur Web D02</span>
                                    <?php elseif($rw['Niveau'] == 5): ?>
                                        <span>Concepteur site Web</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td><?php echo $rw['Note']; ?>/20</td>
                            <td class="text-center">
                                <div class="d-flex align-items-center">
                                    <?php if($rw['Statut'] == 0): ?>
                                        <span class="badge bg-warning text-dark">En attente</span>
                                    <?php elseif($rw['Statut'] == 1): ?>
                                        <span class="badge bg-primary  text-dark">Validé</span>
                                    <?php elseif($rw['Statut'] == 2): ?>
                                        <span class="badge bg-danger text-dark">Non validé</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td><?php echo $rw['Date']; ?></td>
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
                                                <p style="font-family:'Patua One';">Voulez-vous supprimer ce resultat?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="delete_historique.php?id=<?=$rw['id'];?>">
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
                                                        <p style="font-family:'Patua One';">Voulez-vous changer le statut?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="?page=edit_historique&id=<?php echo $rw['id']; ?>">
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
                </tbody>
            </table>
        </div>


</section>

                   