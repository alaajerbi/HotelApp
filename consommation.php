<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";
$db=null;
try {
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (Exception $e) {
    echo $e->getMessage();    
} 

$nc = $_POST['nc'];
$lb = $_POST['lb'];
$qt = $_POST['qt'];


$req = $db->query("SELECT * FROM chambre ch WHERE ch.num_chambre=$nc ;");

if ($req->rowCount()==0) {
    echo "Numéro de chambre erroné !!!";
    die();
} else {
    $req= $db->query("SELECT num_consommable,prix FROM consommable c WHERE c.libelle='$lb' ;");
    $t=$req->fetch(PDO::FETCH_OBJ);
    $num_consommable = $t->num_consommable;
    $prix = $t->prix;
    $date = date('d-m-Y');
    $req = $db->prepare("INSERT INTO consommation(num_consommable,date_consommation,qte,total,num_chambre) VALUES(?,?,?,?,?);");
    $res= $req->execute(array($num_consommable,$date,$qt,$qt*$prix,$nc));
    if ($res) {
        echo " <font color='red' size='18'><center>Ajout effectué !!!</center></font> ";
    }
    else{
        echo "<font color='red' size='18'><center>Echec d'enregistrement de consommation !!!</center></font>";
    }
}
?>
