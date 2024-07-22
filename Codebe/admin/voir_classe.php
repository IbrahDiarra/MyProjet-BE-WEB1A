
<section class="page-section">
    <?php
        require_once('connect.php');
    ?>


        <div class="container bg-white" style="border-radius:15px;">
            <div class="row  mt-5">
                <h2 class="text-center text-primary" style="font-family: 'Lobster Two';">La liste des différentes classes</h2><br>
                <div>
                    <a href="?page=ajout_classe">
                        <button class="btn btn-primary m-2"style="color:white;font-family:Lobster; font-size:15px;" type="button">Ajouter une classe</button>
                    </a>
                </div> 
            </div>

            <table class="table table-striped mt-3" >
                <colgroup >
					<col width="10%">
					<col width="30%">
					<col width="10%">
					<col width="30%">
					<col width="20%">
				</colgroup>
                <thead class="bg-info" style="font-family: 'Patua One';" >
                    <tr>
                        <th>Id</th>
                        <th>Classe</th>
                        <th>Effectif</th>
                        <th>Filière</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $ReadSql = "SELECT *FROM `classe` ";
                        $res = mysqli_query($con, $ReadSql);
                         
                           while($r=mysqli_fetch_assoc($res)){ 
                               $id_filiere=$r['id_filiere'];
                            ?>
                            <tr>
                                <th scope="row"><?php echo $r['id']; ?></th>
                                <td><?php echo $r['lib_classe']; ?></td>
                                <td><?php echo $r['effectif']; ?></td>
                                <td>
                                   <?php 
                                        $filiere = "SELECT *FROM `filiere` ";
                                            //excuter la requette
                                        $res1 = mysqli_query($con, $filiere);

                                        while($row1=mysqli_fetch_assoc($res1)){
                                            if($id_filiere == $row1['id']): ?>
                                                <span><?=$row1['lib_filiere']?></span>
                                            <?php endif; ?>
                                    <?php }?>
                                </td>
                                <td>
                                    <div class="d-flex">

                                        <i data-bs-toggle="modal" data-bs-target="#exampleModalet<?php echo $r['id']; ?>" style="cursor:pointer;">
                                            <span><img src="icon1/edit.svg" alt="" style="width:30px; height:30px;"></span>
                                        </i>
                                        <i data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $r['id']; ?>" style="cursor:pointer;">
                                            <span><img src="icon1/delete.svg" alt="" style="width:30px; height:30px;"></span>
                                        </i>
                                    </div>
                                    <div class="modal fade" id="exampleModal1<?php echo $r['id']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h3 style="font-family:'Lobster Two';">Attention</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="font-family:'Patua One';">Voulez-vous supprimer cette classe?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="delete_classe.php?id=<?=$r['id'];?>">
                                                        <button class="btn btn-danger">Confirmer</button>
                                                    </a>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalet<?php echo $r['id']; ?>" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h3 style="font-family:'Lobster Two';">Attention</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p style="font-family:'Patua One';">Voulez-vous editer cette classe?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="?page=edit_classe&id=<?php echo $r['id']; ?>">
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

                   