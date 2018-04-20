<?php session_start();
if (isset($_SESSION['login'])){
	header( 'Location: index.php' );
}
else echo"

<doctype! html>
<html>
	<head>
		<title>Connectez Vous</title>
	</head>
	<body>
		<form method='POST' action='connect.php'>
			<table border=0 align='center'>
			<tr><td>login <td><input type='text' name='login' class='champ' size=30><br>
			<tr><td>password <td><input type='text' name='mdp' class='champ'size=30></td></tr><br><br>
			<tr><td align='center' colspan=2><input type='submit' value='Connecter'></td></tr>
		</form>
	</body>
</html>";
?>