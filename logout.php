<?php
/**
 * Created by PhpStorm.
 * User: alaa
 * Date: 4/12/18
 * Time: 8:52 PM
 */

    if(isset($_SESSION['id'])){
        session_destroy();
    }
    header('Location: login.php');