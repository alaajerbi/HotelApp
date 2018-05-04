<?php

    //Check if the user is not logged in and redirect him to the login page.
    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">

   </head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #e3f2fd;">
    <!-- Navbar content -->
        <a class="navbar-brand nav-link" href="/index.php"><img src="./images/logo-white.png" width="30" height="30" class="d-inline-block align-top mr-1" alt="">Hotel App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link <?php if($pageId=='reservations'){ echo 'active';} ?>" href="#">Reservations <img class="nav-img" src="./images/reservations-white.png"/></a></li>
                <li class="nav-item"><a class="nav-link <?php if($pageId=='customers'){ echo 'active';} ?>" href="customers.php">Customers <img class="nav-img" src="./images/customers-white.png"/></a></li>
                <li class="nav-item"><a class="nav-link <?php if($pageId=='supplies'){ echo 'active';} ?>" href="#">Supplies <img class="nav-img" src="./images/supplies-white.png"/></a></li>
                <li class="nav-item"><a href="../logout.php"><button class="btn btn-outline-info my-2 my-sm-0">Logout <i class="fas fa-sign-out-alt"></i></button></a></li>
            </ul>
        </div>
        <ul class="navbar-nav">

        </ul>
    
</nav>
<div class="container mb-2">