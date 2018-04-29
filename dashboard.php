<?php
    $pageTitle = "Hotel App - Dashboard";
    include('inc/header.php');
    
    
    $id = $_SESSION['login'];
    
    $db= new PDO("mysql:host=localhost;dbname=hotel", "root", "");
    $sql = "SELECT * FROM receptionniste WHERE login=?";
    
    $results = $db->prepare($sql);
    $results->bindValue($id, PDO::PARAM_INT);
    $results->execute();
    
    $info = $results->fetchAll();
    
    ?>
    
    <div class="jumbotron">
        <img class="rounded float-right user-img" src="images/agent.png">
        <h3><b>Hello,</b> Alaa Jerbi!</h3>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card" style="width: 18rem;">
                <a href="#"><img class="card-img-top" src="images/reservations-card.jpeg" alt="Card image cap"></a>
                <div class="card-body">
                    <h5 class="card-title">Manage Reservations</h5>
                    <p class="card-text">View, edit, and start the check-out process on the current reservations.</p>
                    <a href="reservations.php" class="btn btn-info my-2 my-sm-0 btn-block">Go</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card" style="width: 18rem;">
                <a href="#"><img class="card-img-top" src="images/customers-card.jpg" alt="Card image cap"></a>
                <div class="card-body">
                    <h5 class="card-title">Manage Customers</h5>
                    <p class="card-text">View and edit our customers' information.</p>
                    <a href="customers.php" class="btn btn-info my-2 my-sm-0 btn-block">Go</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card" style="width: 18rem;">
                <a href="#"><img class="card-img-top" src="..." alt="Card image cap"></a>
                <div class="card-body">
                    <h5 class="card-title">Manage Supplies</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-info my-2 my-sm-0 btn-block">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
<?php
    include('inc/footer.php');
?>