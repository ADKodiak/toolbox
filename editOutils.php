<?php session_start() ?>
<?php
if(isset($_SESSION['id'])){

 try
{
                $bdd = new PDO('mysql:host=kyamobepqearthur.mysql.db;dbname=kyamobepqearthur;charset=utf8', 'kyamobepqearthur', 'Timon1999');
}
            catch(Exception $e)
{
             die('Erreur : '.$e->getMessage());
}

$valid = 0;
if(isset($_POST['name'])){
    
$fonction = htmlspecialchars($_POST['name']);
$marque = htmlspecialchars($_POST['marque']);
$garantie = htmlspecialchars($_POST['garantie']);
$date_achat = htmlspecialchars($_POST['dateAchat']);
$description = htmlspecialchars($_POST['description']);
$etat = htmlspecialchars($_POST['etat']);
$id_boite = htmlspecialchars($_POST['id_boite']);
$quantite = htmlspecialchars($_POST['quantite']);
$photo = htmlspecialchars($_POST['photo']);
$id_outils = htmlspecialchars($_POST['id_outils']);





$req = $bdd->prepare('UPDATE outils SET fonction = :fonction, marque = :marque, garantie = :garantie, date_achat = :date_achat, description = :description, etat = :etat, quantite = :quantite, photo = :photo  WHERE id_outils = :id_outils');;

$valid =  $req->execute(array(
    'fonction' => $fonction,
    'marque' => $marque,
    'garantie' => $garantie,
    'date_achat' => $date_achat,
    'description' => $description,
    'etat' => $etat,
    'id_outils' => $id_outils,
    'quantite' => $quantite,
    'photo' => $photo
    )); ;



} 


header('Location: detailsOutils.php?valid='.$valid); 


}



 ?>
