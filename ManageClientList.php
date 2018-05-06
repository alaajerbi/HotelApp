<?php
/**
 * Created by PhpStorm.
 * User: yosra
 * Date: 20/03/18
 * Time: 19:33
 */

try{
    $db=new PDO('mysql:host=localhost;dbName=HotelDB','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e)
{
    die('Error :' . $e->getMessage());
}


$db->query('USE test');

$req=$db->query('SELECT nom from client ORDER BY nom ');




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style.css"/>

    <title>Client List</title>
</head>
<body>


<header id="debut" class="well well-sm" style=" background-color: slateblue; text-align: center;display: block">Press 's' to show the search bar </header>
<span id="recherche" style="display: none">
    <button type="button" onclick="functionReload()" class="btn btn-primary btn-block" >Refesh</button>
<input class="form-control" id="search" type="text" placeholder="Search..." >
</span>
            <table class="table table-bordered table-striped" >
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Info</th>
                </tr>
                </thead>
                <tbody id="myDIV">
                <?php

                while($res = $req->fetch()) { ?>
                <tr>
                    <td><?php $name=$res['nom']; echo $name; ?></td>
                    <?php $request=$db->query('SELECT * FROM jeux_video where nom="'.$name.'"'); $result=$request->fetch(); ?>
                    <td><a href="#" title="Client Info" data-placement ="right" data-toggle="popover" data-trigger="focus" data-content="<?php echo "cin :\n".$result['cin']."\nmetier :\n".$result['metier']."\nEtat civil :\n".$result['etat_civil'] ?>"><button type="button" class="btn btn-info">View</button></a></td>
                </tr>
                <?php   $request->closeCursor();  }  $req->closeCursor();  ?>

                </tbody>
            </table>



<script>

    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });



    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });

    $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myDIV tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    function functionReload() {
        location.reload();
    }
</script>





<script src="ManageButtons.js"></script>



</body>

</html>
