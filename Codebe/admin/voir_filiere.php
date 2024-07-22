<section class="page-section">
    <?php
        require_once('connect.php');
        $ReadSql = "SELECT *FROM `filiere` ";
        $res = mysqli_query($con, $ReadSql);
    ?>


        <div class="container bg-white" style="border-radius:15px;">
            <div class="row  mt-5">
                <h2 class="text-center text-primary titre" style="font-family: 'Lobster Two';">Les filières</h2><br>
                   <div>
                       <a href="?page=ajout_filiere">
                          <button class="btn btn-primary m-2"style="color:white;font-family:Lobster; font-size:15px;" type="button">Ajouter une filière</button>
                       </a>
                   </div> 
            </div>

            <table class="table table-striped mt-3" >
                <colgroup >
					<col width="15%">
					<col width="20%">
					<col width="20%">
				</colgroup>
                <thead class="bg-info">
                    <tr>
                        <th>Id</th>
                        <th>Libellé</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($r=mysqli_fetch_assoc($res)){ ?>
                        <tr>
                            <th scope="row"><?php echo $r['id']; ?></th>
                            <td><?php echo $r['lib_filiere']; ?></td>
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
                                                        <p style="font-family:'Patua One';">Voulez-vous supprimer cette filière?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="delete_filiere.php?id=<?=$r['id'];?>">
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
                                                        <p style="font-family:'Patua One';">Voulez-vous modifier cette filière?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="?page=edit_filiere&id=<?php echo $r['id']; ?>">
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