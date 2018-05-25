<?php
session_start();
if (!isset($_POST['name'])) { 
	header('Location: login.php'); //redirecte l'utilisateur s'il n'est pas connecté
}

$num=$_GET["num"]; // le numéro de la chambre est envoyé dans le lien
require 'connect.php';
$db=connect();
$req=$db->prepare("Select num_chambre from chambre");
$rep=$req->execute();

?>
<html lang="fr">
	<head>
		<title>Modification de la reservation n°<?php echo $num?></title>
		<meta name="author" content="Wassim Mohsni GL2" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/mod_style1.css" />
      	<link rel="stylesheet" type="text/css" href="css/mod_style2.css" />
		<meta charset="UTF-8" />

	</head>
	<body>
		<div class="container">
			<div class="top">
               <a href="index.php"><span>Retour au menu principal</span></a>
               <span class="right"><a href="../logout.php"><span>Deconnecter</span></a></span>
			</div>
			<header class="header"><br>
				<h1>Modification de la reservation n°<?php echo $num?></h1>	
			</header>
			<div class="wrapper"><br>
                
                <div class="form">
                	<form method="POST" onsubmit="return verif();" action="mod.php?num_res=<?php echo $num?>">

                    <p>
					
                    <select name="num_ch" required>
                    <option disabled="" selected="" value="">Numero Chambre</option>
					<?php foreach ($rep as $row){
								$r = $row['num_chambre'];
								print "<option value='$r' >$r</option>}";
					}
					?>
					</select>
                    </p>
					
                    <p><input type="text"  name="offre" value="" placeholder="Offre" required></p>
                    <p><input type="text" name="opt" value="" placeholder="Option Supplémentaire"></p>
					
                    <p class="half">Date debut: <br><br><input type="date" id="deb" name="deb" value="" required></p>
                    <p class="half last">Date fin: <br><br><input type="date" id="fin" name="fin" value="" required></p>
                    <p>
                    <select name="etat" required>
                    <option disabled="" selected="" value="" required>Etat</option>
                    <option value="Active">Active</option>
                    <option value="Finie">Finie</option>
                    </select>
                    </p>
                    <p><input type="submit" name="Modifier" value="Modifier"></p>
					
                    </form>
                    
                    
                </div>
			</div>
			
		</div>
<script src="script.js"></script>	
	</body>
	
</html> 
