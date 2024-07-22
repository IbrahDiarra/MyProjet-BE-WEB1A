<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua One">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster Two">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
<style>
  footer{
    position: fixed;
    bottom:0px;
    left:0px;
    width:100%;
  }

 .ibbtexte2{
      font-family: "Lobster", sans-serif;
      color:green;
      font-size: 25px;
  }
  .ibbtexte3{
      color:orange;
      font-family: "Lobster", sans-serif;
      font-size: 25px;
  }
  .gaucher{
    font-family: "Patua One", sans-serif;
  }
  .solut{
    display:flex;
    justify-content: space-between;
  }
 .social1{
    display: flex;
    gap: .5rem;
    align-items: center;
    justify-content: center;
    transform:translateX(-20px);
 }
 ion-icon{
   font-size: 25px;
   transform: translateY(4px);
 }
 .menu:hover{
   box-shadow: 0 0 30px black;
   transform: translateY(-10px);
 }
 .icon-whats{
    color: darkgreen;
    cursor: pointer;

 }
 .icon-face{
    color: #2c3097;
    cursor: pointer;
 }
 .icon-you{
   color:red;
 }
 .menu{
    width: 2.5rem;
    height: 1.9rem;
    align-items: center;
    display: flex;
    justify-content: center;
    border-radius:25px;
    background:white;
    transition: 0.6s;
 }

</style>


<footer class="mt-5" style="height:3.5rem;background: #c8dfee;">
   <div class="p-3 solut">
      <span class="float-start gaucher" style="top:5px;position:relative;transform:translateY(-5px); font-family:Patua One;">Copyright © 2023. Tous droits reservés.</span>
      <span>
            <div class="d-flex flex-row social1">
                 <a href="https://fb.com" target="_blank" class="menu">
                    <span class="icon-face icon-ib"><ion-icon name="logo-facebook"></ion-icon></span>
                </a>
                <a href="https://whatsapp.com" target="_blank" class="menu">
                    <span class="icon-whats icon-ib"><ion-icon name="logo-whatsapp"></ion-icon></span> 
                </a>
                <a href="https://www.youtube.com" target="_blank" class="menu">
                    <span class="icon-you icon-ib"><ion-icon name="logo-youtube"></ion-icon></span> 
                </a>
            </div>
      </span>
      <span class="float-right d-none d-sm-inline-block" style="top:-5px; right:0px; position:relative;transform:translateY(-4px);">
        <img src="images/logoecole.jpg" alt="" width="50" height="50" style="transform:translateY(-5px);border-radius:20px;">
        <span class="ibbtexte2" ><span class="ibbtexte3">App</span>EPT</span>
      </span>
   </div> 
</footer>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
