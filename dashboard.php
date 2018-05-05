<?php
    $pageTitle = "Hotel App - Dashboard";
    //Include the header
    include('inc/header.php');
    //Get database credentials
    require_once('inc/config.php');
    
    $id = $_SESSION['login'];
    
    try {
        //Connect to the database
        $db= new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,DB_USER,DB_PASS);
    
        $sql = "SELECT * FROM receptionniste WHERE login=?";
    
        $results = $db->prepare($sql);
        $results->bindValue(1, $login, PDO::PARAM_STR);
        $results->execute();
    
        $user = $results->fetchAll();
    }
    catch (PDOException $e){
        die($e->getMessage());
    }
    
    ?>
    
    <div class="jumbotron">
        <img class="rounded float-right user-img" src="images/<?php echo $user[0]['photo']; ?>">
        <h3><b>Hello,</b> <?php echo $user[0]['nom'] . ' ' . $user[0]['prenom']. '!'; ?></h3>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card" style="width: 18rem;">
                <a href="#"><img class="card-img-top" src="images/reservations-card.jpeg" alt="Card image cap"></a>
                <div class="card-body">
                    <h5 class="card-title">Manage Reservations</h5>
                    <p class="card-text">Consulter, ajouter, et éditer les réservations.</p>
                    <a href="affiche_reservation.php" class="btn btn-info my-2 my-sm-0 btn-block">Go</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card" style="width: 18rem;">
                <a href="#"><img class="card-img-top" src="images/customers-card.jpg" alt="Card image cap"></a>
                <div class="card-body">
                    <h5 class="card-title">Manage Customers</h5>
                    <p class="card-text">Consulter la liste des clients et éditer leurs informations.</p>
                    <a href="customers.php" class="btn btn-info my-2 my-sm-0 btn-block">Go</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card" style="width: 18rem;">
                <a href="#"><img class="card-img-top" src="images/drinks-card.jpg" alt="Card image cap"></a>
                <div class="card-body">
                    <h5 class="card-title">Manage Consumptions</h5>
                    <p class="card-text">Gérer les consommations des clients.</p>
                    <a href="consommation.php" class="btn btn-info my-2 my-sm-0 btn-block">Go</a>
                </div>
            </div>
        </div>
    </div>
<?php
    include('inc/footer.php');
?>