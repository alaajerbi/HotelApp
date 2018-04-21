<?php
session_start();
if (isset($_SESSION['login'])){
	header( 'Location: index.php' );
	}
else{
	header("Location: login.php");
}
function auth($login,$pwd){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//$rep=$db->prepare('SELECT count(*) FROM receptionniste');
$rep=$db->prepare("SELECT count(*) FROM receptionniste WHERE login=? AND pwd=?;");
$rep->execute(array($login,$pwd));
$num=$rep->fetchColumn();
return $num;
}
?>