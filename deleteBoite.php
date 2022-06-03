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



if(isset($_POST['idDeBoiteDelete'])){

$deleteIdd = htmlspecialchars($_POST['idDeBoiteDelete']);
echo $deleteIdd;


$req = $bdd->prepare('DELETE FROM boite WHERE id_boite = :deleteId');
$valid = $req->execute(array(
    'deleteId' => $deleteIdd




    )); 
echo $valid;
echo "test";
$bdd->query('ALTER TABLE boite AUTO_INCREMENT=0');

}

}

//header('Location: boite.php?valid='.$valid); 

 ?>