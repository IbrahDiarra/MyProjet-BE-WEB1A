<?php 
  //démarer la session
  session_start();
        require_once('connect.php');
        if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $selSql = "SELECT *FROM `etudiant` WHERE Matricule= '$user'";
        $res = mysqli_query($con, $selSql);
        $r=mysqli_fetch_assoc($res);
        }

        if(isset($_SESSION['enseignant'])){
          $ensei = $_SESSION['enseignant'];
          $resul = "SELECT *FROM `enseignant` WHERE email= '$ensei'";
          $res1 = mysqli_query($con, $resul);
          $row=mysqli_fetch_assoc($res1);
          }

?>
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster Two">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua One">
<style>
    #navbarCollapse li:hover{
        background: #57e5f8;
        border-radius:10px
    }
    nav{
      background-color: #ebf6ff;
      
    }
    .ibtexte2{
      font-family: "Lobster", sans-serif;
      color:green;
      font-size: 35px;
    }
    .ibtexte3{
      color:orange;
      font-family: "Lobster", sans-serif;
      font-size: 35px;
    }
    .navbar-brand{
        color: black;
        margin-left:.5rem;
        
    }
    .ibnav{
      color:black;
      font-family: "Lobster Two";
      font-size: 20px;
    }
    #navbarCollapse ul{
      margin-left:4rem;
      display: flex;
      align-items:center;
    }
    .millieu{
    display: flex;
    gap: 1rem;
    align-items: center;
    justify-content: center;
  }
  .menu1{
      width: 15rem;
      height: 3rem;
      gap:.5rem;
      align-items: center;
      display: flex;
      justify-content: center;
  }
  .menu2{
      width: 3rem;
      height: 3rem;
      align-items: center;
      display: flex;
      justify-content: center;
  }
  .icon2{
      width: 40px;
      height: 40px;
  }

</style>
<nav class="navbar navbar-expand-md navbar-light fixed-top navbar-shrink" id="mynav" style="background-color: #ebf6ff;border-bottom: 3px solid white;">
  <div class="container-fluid">
        <span><img src="images/logoecole.jpg" alt="" width="60px" height="60" style="border-radius:20px;"></span>
        <a class="navbar-brand" href="#"><b class="ibtexte2"><span class="ibtexte3">App</span>EPT</b></a>
        <a href="admin/login.php" target="_blank">
          <button class="btn btn-primary m-2"style="color:white;font-family:Lobster; font-size:15px;" type="button">Admin</button>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0 text-dark">
              <li class="nav-item">
              <a class="nav-link ibnav " href="index.php#home" style="color:black;">Accueil</a>
              </li>
              <li class="nav-item ">
              <a class="nav-link ibnav" href="index.php#about" style="color:black;">A propos</a>
              </li>
              <li class="nav-item">
              <a class="nav-link ibnav" href="index.php#contact" style="color:black;">Nous contactez</a>
              </li>
            <?php if(isset($_SESSION['user'])):$user = $_SESSION['user'];?>
              <li class="nav-item" style="cursor:pointer;">
                <a data-bs-toggle="modal" data-bs-target="#exampleModalet" class="nav-link ibnav" style="color:black;">Mon menu</a>
              </li>
            <?php elseif(isset($_SESSION['enseignant'])): $ensei = $_SESSION['enseignant']; ?>
              <li class="nav-item" style="cursor:pointer;">
                <a data-bs-toggle="modal" data-bs-target="#exampleModalensei" class="nav-link ibnav" style="color:black;">Mon menu</a>
              </li>
            <?php else: ?>
              <li class="nav-item" style="cursor:pointer;">
                <a data-bs-toggle="modal" data-bs-target="#exampleModal1" class="nav-link ibnav" style="color:black;">Mon menu</a>
              </li>
            <?php endif; ?>
          </ul>
          <div class="millieu">
             <?php if(isset($_SESSION['user'])): $user = $_SESSION['user'];?>
                <li><a href="?page=et_compte&id=<?php echo $user ?>" class="menu1 profil nav-link ibnav">
                    <span><img src="image/<?=$r['Photo'];?>" style="width:40px; height:40px; border-radius:20px;"></span>
                    <span style="color:black;font-family: 'Patua One';">Salut,  <?php echo $r['Prenom']?> !</span>
                </a></li>
                <li><a href="./logout.php" class="menu2 nav-link ibnav">
                    <span><img src="./icon/log.svg" alt="" class="icon2" data="se deconnerter"></span>
                </a></li>
              <?php elseif(isset($_SESSION['enseignant'])): $ensei = $_SESSION['enseignant']; ?>
              <li><a href="?page=ensei_compte&id=<?php echo $ensei ?>" class="menu1 profil nav-link ibnav">
                    <span><img src="image/<?=$row['photo'];?>" style="width:40px; height:40px; border-radius:20px;"></span>
                    <span style="color:black;font-family: 'Patua One';">Salut, <?php echo $row['Prenom']?> !</span>
                </a></li>
                <li><a href="./logout.php" class="menu2 nav-link ibnav">
                    <span><img src="./icon/log.svg" alt="" class="icon2" data="se deconnerter"></span>
                </a></li>
              <?php else: ?>
                <li><a data-bs-toggle="modal" data-bs-target="#exampleModalverification" class="menu1 nav-link ibnav"  >
                    <span style="color:black;font-family: 'Patua One'; cursor:pointer;">Se connecter</span>
                </a></li>
              <?php endif; ?>
          </div> 
         </ul>
        </div>
   </div>
</nav>
