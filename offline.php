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

	<title>ToolBox</title>
</head>
<body>
  
  <script src="index.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 
  <script src="http://localhost/toolbox/js/app.js"></script>
 <script src="http://localhost/toolbox/js/promise.js"></script>
 <script src="http://localhost/toolbox/js/fetch.js"></script>
 



  <?php include("navbar.php");  ?>
  <?php include("dbconnect.php");  ?>




<?php  $isPasswordCorrect = 0; ?>
<?php if(isset($_POST['mail']) || isset($_SESSION['id'])){
  if(isset($_POST['mail'])){
  $mail = $_POST['mail'];

  $req = $bdd->prepare('SELECT *  FROM utilisateur WHERE mail = :mail');
  $req->execute(array('mail' => $mail));
  $resultat = $req->fetch();

  $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);

  }
  if(isset($_SESSION['id'])){
   $isPasswordCorrect = 1; 
  }
}







if ($isPasswordCorrect) {

  if(isset($_POST['mail'])){
        $_SESSION['id'] = $resultat['id_utilisateur'];
        $_SESSION['prenom'] = $resultat['prenom'];
        $_SESSION['langue'] = $resultat['langue'];
        ?><p id="langueDeBase" style="display: none"><?php echo $_SESSION['langue']; ?> </p><?php
      }
   if($_SESSION['langue'] =='fr')  {
     ?><script>francais();</script><?php
   } 
   if($_SESSION['langue']=='en'){
     ?><script>anglais();</script><?php
   }
?>
<center>
<div class="d-flex justify-content-center col-lg-5 col-sm-12" style="margin-top: 5vh;"><img src="images/toolbox_0.png" width="100%"></div>
</center>

<center>
<div class="col-sm-10 col-lg-8">
<h1 class="" style="font-family: 'Oswald', sans-serif;"id="acceuil"> Bienvenue sur ToolBox !</h1>
<p style="font-family: 'Open Sans', sans-serif; "id="conseils"> Parcourez les différents menu pour créer votre première boite à outils.</p>
</div>
</center>

<?php if(isset($_SESSION['langue'])){
 
    ?><p id="langueDeBase" style="display: none"><?php echo $_SESSION['langue']; ?> </p><?php
 if($_SESSION['langue'] =='fr')  {

     ?>
     <script>francais_index();</script>

     <?php
   } 
   if($_SESSION['langue']=='en'){

     ?>
     <script>anglais_index();</script>
     <?php
   }
 }
?>

<?php 
}

else {



?>

<center>
<div class="d-flex justify-content-center col-lg-5 col-sm-12" style="margin-top: 5vh;"><img src="images/toolbox_0.png" width="100%"></div>
</center>

<center>
<div class="col-sm-10 col-lg-8">
<h1 style="font-family: 'Oswald', sans-serif;"> Bienvenue sur ToolBox ! </h1>
<p style="font-family: 'Open Sans', sans-serif;"> Connectez vous pour commencer !</p>
</div>
</center>


<?php  } ?>
</body>
</html>