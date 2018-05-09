
<?php
if (!isset($_SESSION['id'])) {
        header('Location: login.php');
    }

if (isset($_POST['room'])) {
    include 'database_connexion.php';

    $req = $bdd->prepare("SELECT num_chambre FROM `chambre` WHERE disponiblite=:disponib AND type=:types");
    $var1 = 'dispo';
    $var2 =$_POST['room'];
    $req->execute(array('disponib' => $var1, 'types' => $var2));


    if ($res = $req->fetch()) {
        echo $res['num_chambre'];
    }

}

        ?>
