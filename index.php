<?php
/**
 * Created by PhpStorm.
 * User: alaa
 * Date: 4/12/18
 * Time: 9:53 PM
 */

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
} else {
    header('Location: dashboard.php');
}
