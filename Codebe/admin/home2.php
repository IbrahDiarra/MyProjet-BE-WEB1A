<?php  require_once('connect.php');
       $req = mysqli_query($con , "SELECT * FROM filiere order by rand()");
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
        background-image:url('../images/ecole2.jpg');
        width:100%;
        height:100%;
     }
    .cardsib{
        display: grid;
        grid-template-columns: repeat(3,1fr);
        grid-gap:2rem;
        margin-top: 2rem;
        width:80%;


    }
    .cardib{
        display: flex;
        background-color: #ebf6ff;
        justify-content: space-between;
        padding: 2rem;
        border-radius: 10px;
        width:22rem;
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
    font-family:'Patua One';
    font-size:20px;
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
    <p class="text-center ibtext">Bienvenue sur la plate-forme AppEPT</p>
    <div class="container">
          
       <div class="cardsib m-5 p-3 pe-5 ps-5">
                <div class="cardib">
                   <a href="?page=home" class="nav-link menu-item1">
                        <div class="d-flex haut">
                            <div>
                                <h3 class="filiere">Les nombres d'étudiants par filiere</h3>
                            </div>
                            <div>
                                <img src="icon1/person_black_24dp.svg" style="width:50px; height:50px;">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cardib">
                   <a href="?page=moyenne_filiere" class="nav-link menu-item1">
                        <div class="d-flex haut">
                            <div>
                                <h3 class="filiere">Les moyennes de classe par filiere</h3>
                            </div>
                            <div>
                                <img src="icon1/bookmarks_black_24dp (1).svg" style="width:50px; height:50px;">
                            </div>
                        </div>
                    </a>
                </div>
        </div>


    </div>
        
    
</section>
