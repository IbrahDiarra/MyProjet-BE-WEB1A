<?php
    require_once('connect.php');
    $ensei = $_SESSION['enseignant'];
    $selSql = "SELECT *FROM `enseignant` WHERE email = '$ensei'";
    $res = mysqli_query($con, $selSql);
    $r=mysqli_fetch_assoc($res);
    $id_enseignant1=$r['id'];
    $sexe=$r['Sexe'];
    
    if($sexe == 'M'){
        $appel="Mr";
    }else{
        $appel="Mme";
    }
?>
<section class="page-section">
        <div class="container bg-white" style="border-radius:15px;">
            <div class="row  mt-5">
                <h4 class="text-center text-primary" style="font-family: 'Lobster Two';">Les cours dispensés par <span style="font-family:'Patua One'; color:black; "><?php echo $appel;?> <?php echo $r['Nom']?> <?php echo $r['Prenom']?></span></h4><br>
                <div>
                    <a href="?page=ajout_cours">
                        <button class="btn btn-primary m-2"style="color:white;font-family:Lobster; font-size:15px;" type="button">Ajouter un cours</button>
                    </a>
                </div> 
            </div>

            <table class="table table-striped mt-3" >
                <colgroup >
					<col width="25%">
					<col width="40%">
					<col width="25%">
				</colgroup>
                <thead style="font-family: 'Patua One';" >
                    <tr>
                        <th>Id</th>
                        <th>Cours</th>
                        <th>Coef</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $resul1 = "SELECT *FROM `cours` WHERE id_enseignant = '$id_enseignant1'";
                        $res1 = mysqli_query($con, $resul1);

                          while($r=mysqli_fetch_assoc($res1)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $r['id']; ?></th>
                                <td><?php echo $r['lib_cours']; ?></td>
                                <td><?php echo $r['coef']; ?></td>
                            </tr>
                     <?php }?>
                </tbody>
            </table>
        </div>


</section>

                   