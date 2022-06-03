<?php session_start() ?>
<?php
echo "test";


if(isset($_SESSION['id'])){
header('Location: boite.php'); 
 try
{
                $bdd = new PDO('mysql:host=kyamobepqearthur.mysql.db;dbname=kyamobepqearthur;charset=utf8', 'kyamobepqearthur', 'Timon1999');
}
            catch(Exception $e)
{
             die('Erreur : '.$e->getMessage());
}


if(isset($_POST['boxName'])){
    
$boxName = htmlspecialchars($_POST['boxName']);
$boxDescription = htmlspecialchars($_POST['boxDescription']);
$boxFirstOutils = htmlspecialchars($_POST['boxFirstOutils']);
$id_utilisateur = $_SESSION['id'];



$req = $bdd->prepare('INSERT INTO boite(nom, description) VALUES(:nom, :description)');

$req->execute(array(
    'nom' => $boxName,
    'description' => $boxDescription

    )); 


 $reponse = $bdd->query("SELECT id_boite FROM boite");

while ($donnees = $reponse->fetch()) {
    $id_boite = $donnees['id_boite'];

}



$req = $bdd->prepare('INSERT INTO outils(fonction, id_boite) VALUES(:fonction, :id_boite)');

$req->execute(array(
    'fonction' => $boxFirstOutils,
    'id_boite' => $id_boite



    )); 

} 

$req = $bdd->prepare('INSERT INTO posseder(id_boite, id_utilisateur) VALUES(:id_boite, :id_utilisateur)');

$req->execute(array(
    'id_boite' => $id_boite,
    'id_utilisateur' => $id_utilisateur



    )); 

}







 ?>