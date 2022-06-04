<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href=" https://revastic.com/manifest.json">

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
<script src="https://revastic.com/js/app.js"></script>
 <script src="https://revastic.com/js/promise.js"></script>
 <script src="https://revastic.com/js/fetch.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="index.js"></script>

<?php include("navbar.php");  ?>
<?php include("dbconnect.php");  ?>



<?php if(isset($_SESSION['id'])){ ?>



<center>
<button class="button-54" role="button" id="buttoncreate" style="margin-top: 5vh; margin-bottom: 3vh;" onclick="create()">Créez votre boîte à outils !</button>
</center>
<style type="text/css">
a:link 
{ 
 text-decoration:none; 
} 
.button-54 {
  font-family: "Open Sans", sans-serif;
  font-size: 16px;
  letter-spacing: 2px;
  text-decoration: none;
  text-transform: uppercase;
  color: #000;
  cursor: pointer;
  border: 3px solid;
  padding: 0.25em 0.5em;
  box-shadow: 1px 1px 0px 0px, 2px 2px 0px 0px, 3px 3px 0px 0px, 4px 4px 0px 0px, 5px 5px 0px 0px;
  position: relative;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-54:active {
  box-shadow: 0px 0px 0px 0px;
  top: 5px;
  left: 5px;
}

@media (min-width: 768px) {
  .button-54 {
    padding: 0.25em 0.75em;
  }
}

.boiteDesign{
 
  border-radius: 10px 10px 10px 10px;
  padding-top: 2vh;
  padding-bottom: 2vh;
  margin-bottom: 2vh;
  box-shadow: 6px 6px 2px 1px lightgrey;

}
</style>






<div class="registration-form" id="formNouvelBoite">
  <header>
    <h1 id="aj_boite">Boîte à outils</h1>
    <p id="aj_in">Remplissez les informations suivantes</p>
  </header>
  <form action="addFirstBox.php" id="formFirstBox" method="post">
    <div class="input-section email-section">
      <input id="aj_nom"class="email" type="text" placeholder="NOM DE VOTRE BOITE" autocomplete="off" name="boxName" />
      <div class="animated-button"><span class="icon-paper-plane"><i class="fa fa-text-width"></i></span><span class="next-button email"><i class="fa fa-arrow-up"></i></span></div>
    </div>
    <div class="input-section password-section folded">
      <input id="aj_des"class="password" type="text" placeholder="DESCRIPTION DE LA BOITE" name="boxDescription"/>
      <div class="animated-button"><span class="icon-lock"><i class="fa fa-comments-o"></i></span><span class="next-button password"><i class="fa fa-arrow-up"></i></span></div>
    </div>
    <div class="input-section repeat-password-section folded">
      <input id="aj_outil" class="repeat-password" type="text" placeholder="AJOUTEZ VOTRE PREMIER OUTILS" name="boxFirstOutils" />
      <div class="animated-button"><span class="icon-repeat-lock"><i class="fa fa-wrench"></i></span><span class="next-button repeat-password" onclick="validFormFirstBox()"><i class="fa fa-paper-plane"></i></span></div>
    </div>
    <div class="success"> 
      <p id="aj_ok">BOITE CREEE</p>
    </div>
  </form>
</div>



<div id="divBoite">
<?php // Condition a mettre ici pour vérifier si il ya des boites
  $id_cet = $_SESSION['id'];


            $reponse = $bdd->query("SELECT boite.* FROM boite JOIN posseder ON posseder.id_boite=boite.id_boite JOIN utilisateur ON posseder.id_utilisateur=utilisateur.id_utilisateur WHERE utilisateur.id_utilisateur=$id_cet" ); 
 while ($donnees = $reponse->fetch()) {

  if(isset($_SESSION['langue'])) {
      if($_SESSION['langue'] =='en')  {

?>
<div class="col-sm-12 boiteDesign" onclick="enregistrerClickBoite(this)" id="<?php echo $donnees['id_boite']; ?>">
  <center><h1 id="boite" style="font-family: 'Oswald', sans-serif;display: inline;"> Box </h1><h1 style="font-family: 'Oswald', sans-serif;display: inline;"> <?php echo $donnees['nom']; ?></h1></center>
</div>

<?php
} 
else{

?>
<div class="col-sm-12 boiteDesign" onclick="enregistrerClickBoite(this)" id="<?php echo $donnees['id_boite']; ?>">
  <center><h1 id="boite" style="font-family: 'Oswald', sans-serif;display: inline;"> Boite</h1><h1 style="font-family: 'Oswald', sans-serif;display: inline;"> <?php echo $donnees['nom']; ?></h1></center>
</div>
<?php
}
   }else{
    ?>
    <div class="col-sm-12 boiteDesign" onclick="enregistrerClickBoite(this)" id="<?php echo $donnees['id_boite']; ?>">
      <center><h1 id="boite" style="font-family: 'Oswald', sans-serif;display: inline;"> Boite</h1><h1 style="font-family: 'Oswald', sans-serif;display: inline;"> <?php echo $donnees['nom']; ?></h1></center>
    </div>
    <?php
     
   }
?>




<?php } ?>
</div>


<?php if(isset($_SESSION['langue'])){
    ?><p id="langueDeBase" style="display: none"><?php echo $_SESSION['langue']; ?> </p><?php
 if($_SESSION['langue'] =='fr')  {

     ?>
     <script>francais_boite();</script>

     <?php
   } 
   if($_SESSION['langue']=='en'){

     ?>
     <script>anglais_boite();</script>
     <?php
   }
 }
 }
else
{ 
    include("notConnectedUI.php");
} 
?>
<script src="js.js"></script>
</body>
</html>
