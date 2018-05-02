<?php
require "connect.php";
$num_res=$_GET["num_res"];
$num_chambre=$_POST["num_ch"];
$etat=$_POST["etat"];
$offre=$_POST["offre"];
$option=$_POST["opt"];
$date_deb=$_POST["deb"];
$date_fin=$_POST["fin"];

$db=connect();

$rep=$db->prepare("UPDATE  reservation SET num_chambre=? ,etat=?, offre=? ,option_supp=? ,date_deb=? ,date_fin=? WHERE num_reservation=? ;");

$rep->execute(array($num_chambre,$etat,$offre,$option,$date_deb,$date_fin,$num_res));

$num=$rep->fetchColumn();
?>