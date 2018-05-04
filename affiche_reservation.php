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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                        <td>  <button type="button" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-map-marker" data-toggle="modal" data-target="#myModal<?php echo ($re['id']) ?>">more info ! </button>

                            ///// <div class="modal fade" id="myModal<?php echo ($re['id']) ?>" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">more info :</h4>
                                        </div>
                                        <div class="modal-body">



                                            <div class ="panel-heading"> reservation recherché : </div>
                                            <div class="panel-body" >


                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>cin</th> <th> metier</th>   <th> type </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td> <?php echo ($re['cin']) ?></td>
                                                        <td> <?php echo ($re['metier']) ?></td>
                                                        <td> <?php echo ($re['type']) ?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                <?php } ?>



                </tbody>
            </table>


        </div>
    </div>



</body>
</html>
