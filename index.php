<?php

require_once "database/connection.php";
require_once "api/connection_api.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="container">
        <div class="row justfify-content-center">
            <div class="col-md-12 text-center">
                <h2> Log in as </h2>
            </div>
            <div class="col-md-6 mt-4 bg-dark text-center">
                <a href="stuff/"> STUFF </a>
            </div>

            <div class="col-md-6 mt-4 bg-dark text-center">
                <a href="patient"> PATIENT </a>
            </div>
        </div>
    </div>

</body>
</html>