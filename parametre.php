
<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href=" http://localhost/toolbox/manifest.json">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald:wght@700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="form.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,900' rel='stylesheet' type='text/css'>
    <title>ToolBox</title>
</head>
<body>
<script src="http://localhost/toolbox/js/app.js"></script>
 <script src="http://localhost/toolbox/js/promise.js"></script>
 <script src="http://localhost/toolbox/js/fetch.js"></script>
 
<script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<?php include("navbar.php");  ?>
<?php include("dbconnect.php");  ?>

<?php if(isset($_SESSION['id'])){ ?>

<!-- langues de l'utilisateur envoyer au java script  -->

<form method="post" action="modifLangue.php" name="formLa">
    <input type="hidden" name="langueUser" id="lla">
   
</form>
<p id="langueDeBase" style="display: none"><?php echo $_SESSION['langue']; ?> </p>

<div class="container-fluid align-items-center"> 
    

	<h1 class="text-center" style="margin-top:20px" id="paraa"> Paramètres <img src="Images/gear.png" width="60px" height="60px"> </h1>
   
 
   
    <form method="post" >
         <legend id="lang"class="text-center"> LANGUES :</legend>
		 <div class="container align-items-center">
		 <p id="fra"class="text-center">Francais</p>
		 <p class="text-center"> <img class="center" src="Images/france.png" style="margin-left:auto;margin-right:auto;cursor: pointer;" width="50px" height="50px" onclick="francais()"> 
         </p>
		 </div>
		 <div class="container align-items-center">
		   <p id="eng"class="text-center">Anglais</p>
		 <p class="text-center"><img src="Images/uk.png" width="50px" height="50px" onclick="anglais()" style="cursor: pointer;"> 
         </p>
		 </div>
		</div>
        <p style="opacity: 0;">ggggggggggggggggggggggggggggggggggggggggggg</p>
        <div class="text-center" >  <button id="val" type="submit" class="btn btn-primary">Valider</button></div>

    </form>
    

</div>
<?php if(isset($_SESSION['langue'])){
    ?><p id="langueDeBase" style="display: none"><?php echo $_SESSION['langue']; ?> </p><?php
 if($_SESSION['langue'] =='fr')  {

     ?>
     <script>francais_par();</script>

     <?php
   } 
   if($_SESSION['langue']=='en'){

     ?>
     <script>anglais_par();</script>
     <?php
   }
 }
?>

<?php }

else{ ?>
<center>
<div class="d-flex justify-content-center col-lg-5 col-sm-12" style="margin-top: 5vh;"><img src="images/toolbox_0.png" width="100%"></div>
</center>

<center>
<div class="col-sm-10 col-lg-8">
<h1 style="font-family: 'Oswald', sans-serif;"> Bienvenue sur ToolBox ! </h1>
<p style="font-family: 'Open Sans', sans-serif;"> Connectez vous pour commencer !</p>
</div>
</center>
<?php } ?>
<script src="js.js"></script>
<script src="index.js"></script>
</body>
</html>