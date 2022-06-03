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


if(isset($_POST['name'])){
 
$fonction = null;
$marque = null;
$garantie = 0;
$date_achat = "9999-01-01";
$description = null;
$etat = null;
$quantite = 1;
$photo = null;
$fichier = null;
$id_boite = htmlspecialchars($_POST['id_boite']);

if(isset($_POST['name']) && $_POST['name'] !== ""){
    $fonction = htmlspecialchars($_POST['name']);    
} 

if(isset($_POST['marque'])  && $_POST['marque'] !== ""){
    $marque = htmlspecialchars($_POST['marque']); 
} 
if(isset($_POST['garantie']) && $_POST['garantie'] !== ""){
    $garantie = htmlspecialchars($_POST['garantie']);    
} 
if(isset($_POST['dateAchat']) && $_POST['dateAchat'] !== ""){
    $date_achat = htmlspecialchars($_POST['dateAchat']);
} 
if(isset($_POST['description']) && $_POST['description'] !== ""){
    $description = htmlspecialchars($_POST['description']);   
} 
if(isset($_POST['etat']) && $_POST['etat'] !== ""){
    $etat = htmlspecialchars($_POST['etat']);
} 
if(isset($_POST['quantite']) && $_POST['quantite'] !== ""){
   $quantite = htmlspecialchars($_POST['quantite']); 
} 
if(isset($_POST['photo']) && $_POST['photo'] !== ""){
    $photo = htmlspecialchars($_POST['photo']);
} 
if(isset($_POST['boite']) && $_POST['boite'] !== ""){
    $id_boite = htmlspecialchars($_POST['boite']);
    header('Location: outils.php'); 
} 
else{
    header('Location: detailsBoite.php'); 
}










// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['fichier']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['fichier']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                if (in_array($extension, $allowedExtensions))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['fichier']['tmp_name'], 'uploads/' . basename($_FILES['fichier']['name']));
						$fichier = 'uploads/' . basename($_FILES['fichier']['name']); // on stocke le chemin 
                        echo "L'envoi a bien été effectué !";
                }
        }
}








$req = $bdd->prepare('INSERT INTO outils(fonction, marque, garantie, date_achat, description, etat, id_boite, quantite,photo,fichier) VALUES(:fonction, :marque, :garantie, :date_achat, :description, :etat, :id_boite, :quantite,:photo,:fichier)');

$req->execute(array(
    'fonction' => $fonction,
    'marque' => $marque,
    'garantie' => $garantie,
    'date_achat' => $date_achat,
    'description' => $description,
    'etat' => $etat,
    'id_boite' => $id_boite,
    'quantite' => $quantite,
    'photo' => $photo,
    'fichier' => $fichier
    )); 



} 

}



 ?>