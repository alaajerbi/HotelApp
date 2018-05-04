<?php
$id =$_POST['id'] ;
$id =$_POST['nom'] ;
$id =$_POST['prenom'] ;
$id =$_POST['check_in'] ;
$id =$_POST['check_out'] ;
$id =$_POST['num_chambre'] ;
require_once("conn.php") ;
$ps=$pdo->prepare("INSERT INTO reservations(nom,prenom,check_in,check_out,num_chambre ) values (?,?,?,?,?)")  ;
$params=array($nom,$prenom,$check_in,$check_out,$num_chambre) ;
$ps->execute($params) ;
header("location:affiche_reservation.php") ;
$ps=$p ;



?>



