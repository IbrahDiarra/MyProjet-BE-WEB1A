
<section class="page-section">
    <?php
        require_once('connect.php');
        $ReadSql = "SELECT *FROM `formation` ";
        $res = mysqli_query($con, $ReadSql);
    ?>


        <div class="container bg-white" style="border-radius:15px;">
            <div class="row  mt-5">
                <h2 class="text-center text-primary titre" style="font-family: 'Lobster Two';">La liste des formations</h2><br>
                   <div>
                       <a href="?page=ajout_forma">
                          <button class="btn btn-primary m-2"style="color:white;font-family:Lobster; font-size:15px;" type="button">Ajouter une formation</button>
                       </a>
                   </div> 
            </div>

            <table class="table table-striped mt-3" >
                <colgroup >
					<col width="5%">
					<col width="20%">
					<col width="20%">
					<col width="40%">
					<col width="15%">
				</colgroup>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Libellé</th>
                        <th>Categorie</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($r=mysqli_fetch_assoc($res)){
                           $r['description_forma'] = strip_tags(stripslashes(html_entity_decode($r['description_forma'])));
                        ?>
                        <tr>
                            <th scope="row"><?php echo $r['id']; ?></th>
                            <td><?php echo $r['nom_formation']; ?></td>
                            <td><?php echo $r['categorie_formation']; ?></td>
                            <td><p class="truncate-1 m-0"><?php echo $r['description_forma'] ?></p></td>
                            <td>
                                    <div class="d-flex"> 
                                        <i data-bs-toggle="modal" data-bs-target="#exampleModal2<?php echo $r['id']; ?>" style="cursor:pointer;">
                                            <span><img src="icon1/edit.svg" alt="" style="width:30px; height:30px;"></span>
                                        </i>
                                        <i data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $r['id']; ?>" style="cursor:pointer;">
                                            <span><img src="icon1/delete.svg" alt="" style="width:30px; height:30px;"></span>
                                        </i>
                                        <div class="modal fade" id="exampleModal1<?php echo $r['id']; ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h3 style="font-family:'Lobster Two';">Attention</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="font-family:'Patua One';">Voulez-vous fermer cette formation?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="delete_forma.php?id=<?=$r['id'];?>">
                                                            <button class="btn btn-danger">Confirmer</button>
                                                        </a>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModal2<?php echo $r['id']; ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h3 style="font-family:'Lobster Two';">Attention</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="font-family:'Patua One';">Voulez-vous modifier cette formation?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="?page=edit_forma&id=<?php echo $r['id']; ?>">
                                                            <button class="btn btn-danger">Confirmer</button>
                                                        </a>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    </div>
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

                   