<?php
session_start();

require 'connect_check.php';

if ((isset($_POST["login"])) && (isset($_POST["mdp"]))){
	//auth
	if (auth($_POST["login"],$_POST["mdp"])){
		//auth
		$_SESSION["login"]=$_POST["login"];
		$_SESSION["pwd"]=$_POST["mdp"];
		header( "Location: index.php" );
	}
	else {
		header("Location: login.php");
	}
}
else {
	header("Location: login.php");
}
?>