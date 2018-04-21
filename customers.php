<?php
/**
 * Created by PhpStorm.
 * User: alaa
 * Date: 4/12/18
 * Time: 8:46 PM
 */

    $pageTitle = "Hotel App - Customers";
    $pageId = "customers";
    include('inc/header.php'); ?>
    <div class="row search-box mt-4">
        <div class="col-md-10">
            <input class="form-control form-control-lg" type="text" placeholder="Search for a customer ...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-outline-info btn-block search-button">Search</button>
        </div>
    </div>
    <?php
    include('inc/footer.php');
?>
