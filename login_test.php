<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 20/04/2018
 * Time: 16:06
 */require_once ("conn.php") ;
if (isset($_POST['name'])&&isset($_POST['password']))
{
    $login = $_POST["name"] ;
    $pass = $_POST["password"] ;

    $ps= $pdo->prepare("SELECT * FROM agent WHERE name=? AND password=? ") ;
    $params= array($login,$pass) ;
    $ps->execute($params) ;
    if($user=$ps->fetch())
    {  $res='existe' ;
        echo $res;}
    else
    {
        $res='ok';
        echo $res;
    }
}
?>