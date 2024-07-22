
<section class="page-section">
    <?php

        require_once('connect.php');
        $ReadSql = "SELECT *FROM `enseignant` ";
        $res = mysqli_query($con, $ReadSql);
    ?>


        <div class="container bg-white" style="border-radius:15px;">
            <div class="row  mt-5">
                <h2 class="text-center text-primary" style="font-family: 'Lobster Two';">La liste des enseignants</h2><br>
                <div>
                    <a href="?page=ajout_enseignant">
                        <button class="btn btn-primary m-2"style="color:white;font-family:Lobster; font-size:15px;" type="button">Ajouter un enseignant</button>
                    </a>
                </div> 
            </div>

            <table class="table table-striped mt-3" >
                <colgroup >
					<col width="5%">
					<col width="14%">
					<col width="12%">
					<col width="6%">
					<col width="14%">
                    <col width="14%">
                    <col width="10%">
                    <col width="12%">
				</colgroup>
                <thead class="bg-info" style="font-family: 'Patua One';" >
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Sexe</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($r=mysqli_fetch_assoc($res)){ ?>

                        <tr>
                            <th scope="row"><?php echo $r['id']; ?></th>
                            <td><?php echo $r['Nom']; ?></td>
                            <td><?php echo $r['Prenom']; ?></td>
                            <td><?php echo $r['Sexe']; ?></td>
                            <td><?php echo $r['email']; ?></td>
                            <td><?php echo $r['Contact']; ?></td>
                            <td><img src="../image/<?=$r['photo'];?>" style="width:40px; height:40px; border-radius:15px;"></td>
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
                                                <p style="font-family:'Patua One';">Voulez-vous supprimer cet enseignant?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="delete_enseignant.php?id=<?=$r['id'];?>">
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
                                                        <p style="font-family:'Patua One';">Voulez-vous editer cet enseignant?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="?page=edit_users&id=<?php echo $r['id']; ?>">
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

                   