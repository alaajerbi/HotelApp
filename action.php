

<?php
require 'database_connexion.php';
if (isset($_POST['firstName'])&&isset($_POST['lastName'])&&isset($_POST['cin'])&&isset($_POST['telephone'])
    &&isset($_POST['checkInDate'])&&isset($_POST['checkOutDate'])&&isset($_POST['room']))
{
    $firstName=$_POST['firstName'];$lastName=$_POST['lastName'];$cin=$_POST['cin'];$tel=$_POST['telephone'];
    $checkin=$_POST['checkInDate'];$checkout=$_POST['checkOutDate'];$room=$_POST['room'];
    //add client
    $req=$bdd->prepare('INSERT INTO  client (first_name,last_name,cin,tel) VALUES(:firstName ,:lastName,:cin,:tel) ');
    $req->execute(array('firstName'=>$firstName ,'lastName'=>$lastName,'cin'=>$cin ,'tel'=>$tel));
    //add reservation
    $req=$bdd->prepare('INSERT INTO  reserv(num_reservation,num_chambre,cin,date_deb,date_fin) VALUES(:room_num,:cin,:check_in,:check_out) ');
    $req->execute(array('room_num'=>$room,'check_in'=>$checkin,'check_out'=>$checkout ,'cin'=>$cin));
    //chambre reserve non disponible
    $requests= "UPDATE  chambre SET disponiblite='nondispo' WHERE num_chambre=".$room;
    $reponse= $bdd->query($requests);

    $res="Data Passed Successfully";
    echo json_encode($res);
}
?>
?>
