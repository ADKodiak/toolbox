<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
    <img src="images/toolbox.png" width="35" height="35" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" id="nav_outils" href="outils.php">Vos outils</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" id="nav_boites"href="boite.php">Vos boîtes à outils</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"id="nav_para" href="parametre.php">Paramètres</a>
      </li>


    </ul>
    

    <ul class="navbar-nav mr-right">

      <li class="nav-item">
        <a href="connect.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit" id="nav_co">Connexion</button></a>
      </li>
    </ul>
  </div>
  <?php if(isset($_SESSION['langue'])){
    ?><p id="langueDeBase" style="display: none"><?php echo $_SESSION['langue']; ?> </p><?php
 if($_SESSION['langue'] =='fr')  {

     ?>
     <script>francais_nav();</script>

     <?php
   } 
   if($_SESSION['langue']=='en'){

     ?>
     <script>anglais_nav();</script>
     <?php
   }
 }
?>
</nav>