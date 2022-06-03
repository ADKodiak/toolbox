<?php session_start() ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="manifest" href=" https://revastic.com/manifest.json">

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo 'css.css?='.time(); ?>"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald:wght@700&display=swap" rel="stylesheet"> 

		<title>ToolBox</title>
	</head>

	<body>
	<script src="https://revastic.com/js/app.js"></script>
 <script src="https://revastic.com/js/promise.js"></script>
 <script src="https://revastic.com/js/fetch.js"></script>
		<script src="<?php echo 'js.js?='.time(); ?>"></script>
		<script src="index.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="index.js"></script>

		<?php include("navbar.php");  ?>
		<?php include("dbconnect.php");  ?>
		<?php include("menuEditOutils.php");  ?>


		
		


<form method="post" action="deleteOutils.php" name="deleteOutils">
    <input type="hidden" name="idDeLOutilDelete" id="idDeLOutilDelete">
</form>







		<div class="iconAddOutils">
			<img src="images/edition.png" width="30vh" onclick="editOutils()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="images/delete.png" width="30vh" onclick="deleteOutilss()">
		</div>

		<?php 
		      $id_boite = htmlentities($_COOKIE['id_outils'], 7, 'UTF-8');


		      $reponse = $bdd->query("SELECT * FROM outils WHERE id_outils='$id_boite'"); 
		      while ($donnees = $reponse->fetch()) {
		      ?> <script type="text/javascript">
		      	document.getElementById("nomOutils").value = "<?php echo $donnees['fonction'];  ?>"
		      	document.getElementById("marque").value = "<?php echo $donnees['marque'];  ?>"
		      	document.getElementById("garantie").value = "<?php echo $donnees['garantie'];  ?>"
		      	document.getElementById("dateAchat").value = "<?php echo $donnees['date_achat'];  ?>"
		      	document.getElementById("quantite").value = "<?php echo $donnees['quantite'];  ?>"
		      	document.getElementById("photo").value = "<?php echo $donnees['photo'];  ?>";
		      	document.getElementById("description").value = "<?php echo htmlspecialchars($donnees['description']);  ?>";

		      	if("<?php echo $donnees['etat'];  ?>" == "neuf"){
		      		etat = 0;
		      	}
		      	else if("<?php echo $donnees['etat'];  ?>" == "Bon état"){
		      		etat = 1;
		      	}
		      	else if("<?php echo $donnees['etat'];  ?>" == "Mauvais état"){
		      		etat = 2;
		      	}
		      	else{
		      		etat = 3;
		      	}
		      	document.getElementById("etat").selectedIndex = etat;
		      </script><?php	
		?>


		<!-- Boucle ici pour chaque outils-->
		<center>
		<div id="detailsDesOutils">

		 <?php


		  if(isset($_SESSION['langue'])){
   			 ?><p id="langueDeBase" style="display: none"><?php echo $_SESSION['langue']; ?> </p><?php
 
  			 if($_SESSION['langue']=='en'){
				   

  		   ?>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_nom">Name : </b><?php echo $donnees['fonction'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_marque">Brand : </b><?php echo $donnees['marque'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_garantie">Guarantee : </b><?php echo $donnees['garantie'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_date">Date of purchase :</b> <?php echo $donnees['date_achat'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_desc">Description :</b> <?php echo $donnees['description'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_etat">State :</b> <?php echo $donnees['etat'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_q">Quantity : </b><?php echo $donnees['quantite'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_ph">URL picture : </b></p>
			<?php if($donnees['photo'] != ""){ ?>
			<img src="<?php echo $donnees['photo'];  ?>" width="200px" >
			<?php } else{?>
				<p>None</p>
			<?php }?>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_f">Picture : </b></p>
			<?php if($donnees['fichier'] != ""){ ?>
			<img src="<?php echo $donnees['fichier'];  ?>" width="200px" >
			<?php } else{?>
				<p  id="b_r">None</p>
			<?php }
    	 
  		 }	
   		else{
		?>

	

			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_nom">Nom : </b><?php echo $donnees['fonction'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_marque">Marque : </b><?php echo $donnees['marque'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_garantie">Garantie : </b><?php echo $donnees['garantie'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_date">Date d'achat :</b> <?php echo $donnees['date_achat'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_desc">Description :</b> <?php echo $donnees['description'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_etat">Etat :</b> <?php echo $donnees['etat'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_q">Quantitée : </b><?php echo $donnees['quantite'];  ?> </p>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_ph">Photo URL : </b></p>
			<?php if($donnees['photo'] != ""){ ?>
			<img src="<?php echo $donnees['photo'];  ?>" width="200px" >
			<?php } else{?>
				<p> Aucune</p>
			<?php }?>
			<p class="detailOutilText" onclick="affDetailsOutils(this)"><b  id="b_f">Photo : </b></p>
			<?php if($donnees['fichier'] != ""){ ?>
			<img src="<?php echo $donnees['fichier'];  ?>" width="200px" >
			<?php } else{?>
				<p  id="b_r"> Aucune</p>
			<?php }?>

			<?php
   }
 }
?>



		</div>
		</center>
		<?php } ?>




<div class="box">
	<a class="button" href="#popup1" id="popup1Click"></a>
</div>


<div id="popup1" class="overlay">
	<div class="popup">
		<div style="display: flex; justify-content: center; flex-direction: row;"><h2 style="margin-right: 2vh;">Parfait</h2><img src="images/valid.png" width="7.5%"></div>
		<a class="close" href="#">&times;</a>
		<div class="content">
			La modification des données à fonctionné parfaitement  !
		</div>
	</div>
</div>

<div class="box">
	<a class="button" href="#popup2" id="popup1Click"></a>
</div>


<div id="popup2" class="overlay">
	<div class="popup">
		<div style="display: flex; justify-content: center; flex-direction: row;"><h2 style="margin-right: 2vh;">Erreur</h2><img src="images/error-message.png" width="7.5%"></div>
		<a class="close" href="#">&times;</a>
		<div class="content">
			Une erreur c'est produite, veuillez réessayer plus tard  !
		</div>
	</div>
</div>


<script type="text/javascript">
	
let params = new URLSearchParams(location.search);
var valid = params.get('valid')





 if(valid == 1){


document.getElementById('popup1Click').click();

}
else{
   document.getElementById('popup2Click').click();
} 


</script>





<script type="text/javascript">


	temp = getCookie("id_outils");
	document.getElementById("hiddenInput2").value = temp;

	document.getElementById("idDeLOutilDelete").value = temp;


</script>
	</body>
</html>