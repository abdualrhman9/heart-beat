<?php
session_start();
require_once "database/connection.php";
require_once "api/connection_api.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCU|Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <?php if(isset($_SESSION['login_error'])) {?>
        <div class="alert alert-danger" role="alert">
            <?=$_SESSION['login_error']?>
        </div>
    <?php session_unset();  } ?>
    <div class="container mt-4 ">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">

            <h1 class="mt-4"> CIS FOR CCU </h1>
            <h3> Log in as </h3>
            </div>
            <div class="col-md-6 mt-4  text-center">
                <a href="stuff/" class="nav-link btn btn-info" style="color: white; font-size: 18px" > STAFF </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4  text-center">
                <a href="patient" class="nav-link btn btn-info" style="color: white; font-size: 18px" > PATIENT </a>
            </div>
        </div>
    </div>

</body>
</html>
<?php session_unset();  ?>