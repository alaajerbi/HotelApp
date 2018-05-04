<?php
/**
 * Created by PhpStorm.
 * User: alaa
 * Date: 4/12/18
 * Time: 9:53 PM
 */

if (isset($_SESSION['login'])) {
    //If the user is already logged in, redirect him to the dashboard.
    header('Location: dashboard.php');
} else {
    //Else, redirect him to the login page.
    header('Location: login.php');
}
