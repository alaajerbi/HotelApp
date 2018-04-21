<?php

$db=new mysqli("localhost","root","","hotel");

$nc = $_POST['nc'];
$lb = $_POST['lb'];
$qt = $_POST['qt'];


$req="SELECT * FROM chambre ch WHERE ch.num_chambre=$nc ;";
$res=mysqli_query($db,$req);
if(mysqli_num_rows($res)==0){
    " <font color='red' size='18'><center>Numéro de chambre !!!</center></font> ";
    die();
}
else{
    $req1="SELECT num_consommable FROM consommable c WHERE c.libelle='$lb'; ";
    $res=mysqli_query($db,$req1);
    $t=mysqli_fetch_array($res);
    $num_consommable = $t[0];
    $req2="SELECT prix FROM consommable c WHERE c.libelle='$lb' ;";
    $res=mysqli_query($db,$req2);
    $t=mysqli_fetch_array($res);
    $prix = $t[0];
    $date = date('d-m-Y');
    $req = "INSERT INTO consommation(num_consommable,date_consommation,qte,total,num_chambre) VALUES($num_consommable,$date,$qt,$qt*$prix,$nc);";
    $res=mysqli_query($db,$req);
    if($res){
        echo " <font color='red' size='18'><center>Ajout effectué !!!</center></font> ";
    }
    else{
        echo " <font color='red' size='18'><center>Echec d'enregistrement de consommation !!!</center></font> ";
    }
}