<?php  require_once('connect.php');
       $req = mysqli_query($con , "SELECT * FROM filiere");
?>
<style>
     .imag1{
        height:28rem;
        border-radius: 0px 20px 0px 20px;
     }
     .ibtext{
        font-family:"Lobster";
        font-size:30px;
        color: black;
     }
     .home{
        background-image:url('../images/ecole4.jpg');
        width:100%;
        height:100%;
     }
    .cardsib{
        display: grid;
        grid-template-columns: repeat(3,1fr);
        grid-gap:2rem;
        margin-top: 1rem;
        width:80%;
    }
    .cardib{
        display: flex;
        background-color: #ebf6ff;
        justify-content: space-between;
        padding: 2rem;
        border-radius: 10px;
        width:17rem;
        flex-direction:column;
        cursor:pointer;
        box-shadow: 3px 3px 7px black, -2px -2px 5px black; 
        transition: 0.6s;
   }

.cardib:hover{
    
    background-color: hsl(250, 19%, 63%);
    color: black;
    transform: translateY(-8px);
}
 .filiere{
    font-family:'Lobster Two';
 }
 h5{
    font-family:'Lobster';
 }
 .haut{
    display:flex;
    justify-content:space-between;
 }
 .nombre{
    font-family:'Patua One';
    color:blue;
 }
</style>
<section class="page-section home pt-3" id="about" style="border-radius:15px;">
    <p class="text-center ibtext">La répartition du nombre d'étudiants par filière</p>
    <div class="container">
          
       <div class="cardsib p-3 pe-5 ps-5">
          <?php while($row = mysqli_fetch_assoc($req)){
                $id_fili=$row['id'];
            ?>
            <div class="cardib">
                    <div class="d-flex haut">
                        <div>
                            <h3 class="filiere"><?=$row['lib_filiere']?></h3>
                            <h5>
                                <span class="nombre">
                                <?php 
                                    $veri= "SELECT *FROM `classe` WHERE id_filiere = '$id_fili' ";
                                    $resul_veri=mysqli_query($con, $veri);
                                    if(mysqli_num_rows($resul_veri) == 0){
                                       $somme=0;
                                    }else{
                                       $effectif = "SELECT SUM(effectif) FROM `classe` WHERE id_filiere = '$id_fili' ";
                                       //excuter la requette
                                       $resultat = mysqli_query($con, $effectif);
                                       $ligne = mysqli_fetch_assoc($resultat);
                                       $somme = $ligne['SUM(effectif)'];
                                    }       
                                ?>
                                <?=$somme;?>
                                </span> Etudiants</h5>
                        </div>
                        <div>
                            <img src="icon1/person_black_24dp.svg" style="width:50px; height:50px;">
                        </div>
                    </div>
            </div>
            <?php }?>
        </div>


    </div>
        
    
</section>
