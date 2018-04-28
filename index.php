<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Platform</title>
    <meta name='Hotel Platform' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body id='b'>
<section id="formsection">
      <h1 align="center"> Gestion Consommation </h1>
        <form name='fconso' method='POST' action='consommation.php' class="form-inline">
        <center>
          
           <div class="form-group">
            <label id='l1' name='nc'>Numéro Chambre:</label> <input id='i1' class="form-control" type='text' name='nc' required> </input><br><br><br>
</div>
  <div class="form-group">
            <label id='l2' name='lib'>Libellé:</label>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";
$db = null;
try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<SELECT id="lb" name='lb' class="form-control">


<?php
$req = $db->query("SELECT libelle FROM consommable ;");
while ($t = $req->fetch(PDO::FETCH_NUM)) {
    $str = $str . '<OPTION value="' . $t[0] . '">' . $t[0] . "</OPTION>";
}

echo $str;
?>


</SELECT>
</div>
<br><br><br>
  <div class="form-group">
            <label id='l3' id='qt'>Quantité:</label> <input id="i2" type='text'  class="form-control" name='qt' required></input><br><br><br>
        </div>
            <input type='submit' class="btn-primary" value='Enregistrer'></input>
            <input class="btn-danger" type='reset'value ='Annuler'></input>
        </center>
 </form>
</section>

</body>

</html>