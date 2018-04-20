<?php
require_once ("conn.php") ;

$req= "SELECT * FROM reservations " ;
$ps= $pdo->prepare($req) ;
$ps->execute() ;
?>

<html>
<head>
    <title>
        afficher reservations
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap/.min.js"></script>
</head>
<body>
<div class="col-md-12 col-xs-12 spacer" >
    <right><form method="get" action="search.php">

            <input  type="text" name="q" id="text" placeholder="looking for someone ?" />
            <input   class="btn btn-primary , glyphicon glyphicon-search" type="submit" value="Search"  />




        </form> </right>

    <div class="panel panel-info spacer">


        <div class ="panel-heading"> liste des réservations </div>
        <div class="panel-body" >


            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID </th> <th> Name</th> <th> Family_name</th>  <th> check_in </th> <th> check_out </th> <th>Num_Room </th>
                </tr>
                </thead>
                <tbody>

                <?php   while($re=$ps->fetch()) {  ?>
                    <tr>
                        <td> <?php echo ($re['id']) ?></td>
                        <td> <?php echo ($re['nom']) ?></td>
                        <td> <?php echo ($re['prenom']) ?></td>
                        <td> <?php echo ($re['check_in']) ?></td>
                        <td> <?php echo ($re['check_out']) ?></td>
                        <td> <?php echo ($re['num_chambre']) ?></td>


                        <td> <a href="#" class="btn btn-primary btn-success glyphicon glyphicon-cutlery"><span class="glyphicon glyphicon-glass"></span> consom</a> </td>
                        <td>   <a href="#" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-home"></span> check_out</a> </td>
                        <td> <a href="#" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-trash"></span> delete</a> </td>
                        <td>  <a href="#" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-map-marker"></span> more info</a> </td>



                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>

</html>
