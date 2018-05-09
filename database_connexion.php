
<?php
if (!isset($_SESSION['id'])) {
        header('Location: login.php');
    }
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=db_hotel;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>
