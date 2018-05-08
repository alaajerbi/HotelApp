<?php

$pageTitle = "Hotel App - Reservation";
$pageId='reservations';
include('inc/header.php');?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/styl.css">

</head>
<body>

<div style="margin-left:20px;margin-top:50px;">
    <div id="bc1" class="myBreadcrumb">
        <a href="#" class="next" id="check" value="yes" onclick="afficherDates(this)"><div>1.Check availibility</div></a>
        <a href="#" class="next" id="room" onclick="afficherRoom(this)"><div>2.Choose Room</div></a>
        <a href="#" class="next" id="reserv" onclick="afficherreservation(this)"><div>3.Make reservation</div></a>
        <a href="#" class="next" id="confirmation" onclick="afficherConfirmation(this)"><div>4.confirm</div></a>
    </div>
</div>

<div class="dates form-group">
    <div><strong>Check in</strong></div></a><input type="date" name="checkIn" class="form-control" id="checkIn" required><br>
    <div><strong>Check out</strong></div><input type="date" name="checkOut" class="form-control" id="checkOut" required><br>
    <button class="btn btn-info btn-xs"  style="width: 150px" id="goNext" onclick="passData1()"><span style="font-size: 24px">Next</span></button>
</div>

<div>
    <div class="form-group makeReservation" id="Reservation">

        <label> First Name :</label><input type="text" name="FirstName" id="FirstName" class="form-control" placeholder="enter first name" required >
        <label> Last Name :</label><input type="text" name="LastName" id="LastName" class="form-control" placeholder="enter last name" required>
        <label>CIN :</label><input type="number" name="cin" id="cin" class="form-control" placeholder="enter cart identy number" pattern="[0-9]{8}" required>
        <label>Num Tel :</label><input type="number" name="tel" id="tel" class="form-control" pattern="[0-9]{8}" placeholder="enter tel number">
        <button class="btn btn-info" onclick="passData3()">next</button>
    </div>
</div>

<div class="container-fluid chooseRoom">

    <div class="type">
        <div style="margin-top: 25px ; margin-left:150px"> <img src="images/superior.jpg"></div>
        <div class="type1">
            <h4 style="margin-top: 25px ; text-decoration: underline" > Superior Room</h4>
            <div class="partie1">
                <div><span><i class="fas fa-bed"></i><strong>  Bed:</strong> 1 Queen-sized bed</span></div>
                <div><span><i class="fa fa-arrows-alt" aria-hidden="true"></i><strong>Sizing:</strong> 50m²</span></div>
            </div>
            <div class="partie2">
                <div><span> <i class="fa fa-users" aria-hidden="true"></i><strong>  Max occupancy:</strong>2 Adults</span></div>
                <div>
                    <i class="fas fa-binoculars"></i><span> <strong>View:</strong> Lake View </span>
                </div>
            </div>
            <div class="partie3">
                <button class="btn btn-info" id="superior" onclick="passData2(this)">Select</button>
            </div>
        </div>
    </div>
    <div class="type">
        <div style="margin-top: 25px ; margin-left:150px"> <img src="images/Room-Type-Single-Room.jpg"></div>
        <div class="type1">
            <h4 style="margin-top: 25px ; text-decoration: underline" > Single Room</h4>
            <div class="partie1">
                <div><span><i class="fas fa-bed"></i><strong>  Bed:</strong> 1 Twin-XL bed</span></div>
                <div><span><i class="fa fa-arrows-alt" aria-hidden="true"></i><strong>Sizing:</strong> 35m²</span></div>
            </div>
            <div class="partie2">
                <div><span> <i class="fa fa-users" aria-hidden="true"></i><strong>  Max occupancy:</strong>1 Person</span></div>
                <div>
                    <i class="fas fa-binoculars"></i><span> <strong>View:</strong> Lake View </span>
                </div>
            </div>
            <div class="partie3">
                <button class="btn btn-info" id="single" onclick="passData2(this)">Select</button>
            </div>
        </div>
    </div>

    <div class="type">
        <div style="margin-top: 25px ; margin-left:150px"> <img src="images/twin-room.jpg"></div>
        <div class="type1">
            <h4 style="margin-top: 25px ; text-decoration: underline" > Twin Room</h4>
            <div class="partie1">
                <div><span><i class="fas fa-bed"></i><strong>  Bed:</strong> 2 Twin-XL bed</span></div>
                <div><span><i class="fa fa-arrows-alt" aria-hidden="true"></i><strong>Sizing:</strong> 40m²</span></div>
            </div>
            <div class="partie2">
                <div><span> <i class="fa fa-users" aria-hidden="true"></i><strong>  Max occupancy:</strong>2 Persons</span></div>
                <div>
                    <i class="fas fa-binoculars"></i><span> <strong>View:</strong> Lake View </span>
                </div>
            </div>
            <div class="partie3">
                <button class="btn btn-info" id="twin" onclick="passData2(this)">Select</button>
            </div>
        </div>
    </div>
    <div class="type">
        <div style="margin-top: 25px ; margin-left:150px"> <img src="images/hotel-suite.jpg"></div>
        <div class="type1">
            <h4 style="margin-top: 25px ; text-decoration: underline" > Suite</h4>
            <div class="partie1">
                <div><span><i class="fas fa-bed"></i><strong>  Bed:</strong> 1 King-bed+2 Twin-XL bed</span></div>
                <div><span><i class="fa fa-arrows-alt" aria-hidden="true"></i><strong>Sizing:</strong> 60m²</span></div>
            </div>
            <div class="partie2">
                <div><span> <i class="fa fa-users" aria-hidden="true"></i><strong>  Max occupancy:</strong> 2 Adults + 2 Children</span></div>
                <div>
                    <i class="fas fa-binoculars"></i><span> <strong>View:</strong> Lake View </span>
                </div>
            </div>
            <div class="partie3">
                <button class="btn btn-info" id="suite" onclick="passData2(this)">Select</button>
            </div>
        </div>
    </div>
    <div class="type">
        <div style="margin-top: 25px ; margin-left:150px"> <img src="images/Interconnecting-Room1.jpg"></div>
        <div class="type1">
            <h4 style="margin-top: 25px ; text-decoration: underline">Interconnecting room</h4>
            <div class="partie1">
                <div><span><i class="fas fa-bed"></i><strong>  Bed:</strong> 2 Twin-XL bed</span></div>
                <div><span><i class="fa fa-arrows-alt" aria-hidden="true"></i><strong>Sizing:</strong> 40m²</span></div>
            </div>
            <div class="partie2">
                <div><span> <i class="fa fa-users" aria-hidden="true"></i><strong>  Max occupancy:</strong>2 Adults + 2 Children</span></div>
                <div>
                    <i class="fas fa-binoculars"></i><span> <strong>View:</strong> Lake View </span>
                </div>
            </div>
            <div class="partie3">
                <button class="btn btn-info" id="interconnecting" onclick="passData2(this)">Select</button>
            </div>
        </div>
    </div>
</div>

<div  id="summary" style="display=none" >
    <h1 align="center">Summary of this reservation</h1><h3>Personal Information </h3>
    <label>First Name :</label><span id="nom">" "</span><br>
    <label>Last Name :</label><span id="prenom">" "</span><br>
    <label>CIN :</label><span id="person_cin">" "</span><br>
    <label>Num Tel :</label><span id="telnum">" "</span><br>
    <hr style="background-color:#444 ; height:1px ;border: 0; ">
    <h3> ROOM</h3>
    <label>Room type : </label> <span id="type_chambre">" "</span><br>
    <label>Room number : </label> <span id="room_num">" "</span><br>
    <hr style="background-color:#444 ; height:1px ;border: 0; ">
    <h3>Check In / Check Out</h3>
    <label>Check_In : </label> <span id="date1">" "</span><br>
    <label>Check_Out : </label> <span id="date2"">" "</span><br>
    <button class="btn btn-info" onclick="passData4()" style="margin-left: 150px ;margin-right: 150px ; margin-top: 25px">Confirm Reservation</button>
</div>
<script src="js/myFunctions.js">
</script>
<script type="text/javascript">

    function passData1() {

        var name = document.getElementById("room");
        var date1=document.getElementById("checkIn").value;
        var date2=document.getElementById("checkOut").value;
        var q = new Date();
        var m = q.getMonth();
        var d = q.getDay();
        var y = q.getFullYear();
        var date = new Date(y,m,d);
        mydate1=new Date(date1);
        mydate2=new Date(date2);

        if((new Date(date1).getTime() > new Date(date2).getTime())||(mydate1<date)||(mydate1.getFullYear()>2030)||(mydate2.getFullYear()>2030))
        {
            swal({
                title: "Invalide dates!",
                text: "Please check dates !",
                icon: "warning",
                button: "retry!",
                dangerMode: true,
            });
        }
        else{
            $(".dates").hide();
            $("#Reservation").hide();
            $("#summary").hide();
            $(".chooseRoom").show();
            change(name);
        }
    }

    function passData2(parm) {
        var name = document.getElementById("reserv");
        var roomType=parm.id;
        $.ajax({
            type: "POST",
            url: "searchRoom.php",
            data: {room:roomType},
            success: function(data) {
                var data1=data.trim();

                if(data1=="notExiste")
                {
                    swal({
                        title: "Opps there is no empty room!",
                        text: "Please choose an other type of room !",
                        icon: "warning",
                        button: "choose an other room!",
                        dangerMode: true,
                    });
                }
                else {
                    var num_chambre=data1;
                    document.getElementById("room_num").innerHTML=num_chambre;
                    document.getElementById("type_chambre").innerHTML=roomType;
                    $(".chooseRoom").hide();
                    $("#summary").hide();
                    $(".dates").hide();
                    $("#Reservation").show();
                    change(name);}

            },
            error: function(err) {
                alert(err);
            }
        });

    }
    function passData3() {
        var name=document.getElementById("confirmation")
        var nom=document.getElementById("FirstName").value;
        var prenom=document.getElementById("LastName").value;
        var carte=document.getElementById("cin").value;
        var tel=document.getElementById("tel").value;
        var checkIn=document.getElementById("checkIn").value;
        var checkOut=document.getElementById("checkOut").value;
        document.getElementById("nom").innerHTML=nom;
        document.getElementById("prenom").innerHTML=prenom;
        document.getElementById("date1").innerHTML=checkIn;
        document.getElementById("date2").innerHTML=checkOut;
        document.getElementById("person_cin").innerHTML=carte;
        document.getElementById("telnum").innerHTML=tel;
        $(".chooseRoom").hide();
        $("#Reservation").hide();
        $(".dates").hide();
        $("#summary").show();
        change(name);
    }
    function passData4() {

        var nom=document.getElementById("FirstName").value;
        var prenom=document.getElementById("LastName").value;
        var carte=document.getElementById("cin").value;
        var tel=document.getElementById("tel").value;
        var checkIn=document.getElementById("checkIn").value;
        var checkOut=document.getElementById("checkOut").value;
        var numchambre=document.getElementById("room_num").innerHTML.trim();
        $.ajax({
            type: "POST",
            url: "action.php",
            data: {firstName:nom,lastName:prenom,cin:carte,telephone:tel,
                checkInDate:checkIn,checkOutDate:checkOut,room:numchambre},
            cache: false,
            success: function(data) {

                swal("done!", "your reservation added successfully!", "success");

            },
            error: function(err) {
                alert(err);
            }
        });

        return false;
    }
    function afficherDates(argu) {
        if(argu.hasAttribute("value"))
        {
            $(".dates").show();
            $(".chooseRoom").hide();
            $("#Reservation").hide();
            $("#summary").hide();
        }
    }
    function afficherRoom(argu) {
        if(argu.hasAttribute("value"))
        {
            $(".chooseRoom").show();
            $(".dates").hide();
            $("#summary").hide();
            $("#Reservation").hide();

        }
    }
    function afficherreservation(argu) {
        if(argu.hasAttribute("value"))
        {
            $(".dates").hide();
            $(".chooseRoom").hide();
            $("#summary").hide();
            $("#Reservation").show();

        }
    }
    function afficherConfirmation(argu) {
        if(argu.hasAttribute("value"))
        {
            $(".dates").hide();
            $(".chooseRoom").hide();
            $("#Reservation").hide();
            $("#summary").show();

        }
    }
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

</body>
</html>
