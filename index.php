
<html>

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hotel Platform</title>
    <meta name='Hotel Platform' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css' />
</head>

<body id='b'>
<section>
        <form name='fconso' method='POST' action='consommation.php'>
        <center>
            <h1> Gestion consommation </h1>
            <label id='l1' name='nc'>Numéro Chambre:</label> <input id='i1' type='text' name='nc' required> </input><br><br><br>

            <label id='l2' name='lib'>Libellé:</label>

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
?>  

<SELECT id="lb" name='lb'>


<?php
$req = $db->query("SELECT libelle FROM consommable ;");
while($t=$req->fetch(PDO::FETCH_NUM))
    $str=$str.'<OPTION value="'.$t[0].'">'.$t[0]."</OPTION>";
    echo $str;
?>


</SELECT>

<br><br><br>
            <label id='l3' id='qt'>Quantité:</label> <input id="i2" type='text' name='qt' required></input><br><br><br>
            <input type='submit'  value='Enregistrer'></input>
            <input type='reset'value ='Annuler'></input>
        </center>
 </form>
    </section>

</body>

</html>



