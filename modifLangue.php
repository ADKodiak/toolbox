<?php session_start() ?>
<?php
if(isset($_SESSION['id'])){
header('Location: index.php'); 


 try
{
                $bdd = new PDO('mysql:host=kyamobepqearthur.mysql.db;dbname=kyamobepqearthur;charset=utf8', 'kyamobepqearthur', 'Timon1999');
}
            catch(Exception $e)
{
             die('Erreur : '.$e->getMessage());
}










$langue = htmlspecialchars($_POST['langueUser']);
$id_cet=$_SESSION['id'];
$_SESSION['langue'] = $langue;







$req = $bdd->prepare("UPDATE utilisateur SET langue = :langue  WHERE utilisateur.id_utilisateur=$id_cet");

$req->execute(array(

    'langue' => $langue,
    

    ));



}






   



 




 ?>