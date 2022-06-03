<!-- Connection à la base de données-->
<?php
    
            try
{
                $bdd = new PDO('mysql:host=kyamobepqearthur.mysql.db;dbname=kyamobepqearthur;charset=utf8', 'kyamobepqearthur', 'Timon1999');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
            catch(Exception $e)
{
             die('Erreur : '.$e->getMessage());
}


?>

