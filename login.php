<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login </title>
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="global.css" type="text/css" rel="stylesheet">
    <script src="http://ajax.googleapis/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap/.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

</head>

<body class="bg">

<div class="container-fluid " >

    <div class="row" >
        <div class="col-md-4 col-sm-4 col-xs-12"> </div>
        <div class="col-md-4 col-sm-4 col-xs-12" >
            <div class="form-conatiner">
                <h1> authentification </h1>
                <div class="form-group">
                    <label for="exampleInputEmail1"> name </label>
                    <input type="text" class="form-control"  placeholder="Enter name " name="name" id="nom">

                </div>
                <div class="form-group" >

                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control"  placeholder="Enter password " name="password" id="motdepasse">

                </div>

                <button class="btn  btn-success btn-block"  onclick="cliquer()">submit</button>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12"> </div>


    </div>
</div>

<script type="text/javascript">

    function cliquer() {
        var nom=document.getElementById('nom').value;
        var ps=document.getElementById('motdepasse').value;
        $.ajax({
            type: "POST",
            url: "login_test.php",
            data: {name:nom,password:ps},
            success: function(data) {

                if(data=='existe')
                {

                    window.location.href = "dashboard.php";

                }

                else if(data=='ok')
                {
                    swal({
                            title: "Wrong!",
                            text: "Please retry",
                            type: "warning",
                            timer: 2000,
                            showConfirmButton: false
                        }, function(){
                            window.location.href = "login.php";}
                    );
                }
            },
            error: function(err) {
                alert(err);
            }
        });

    }
</script>

</body>



</html>