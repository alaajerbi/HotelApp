<?php
function connect(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hotel";

	$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	return $db;
}
?>