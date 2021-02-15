<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header("location: index.php");
    }
    require_once "../database/connection.php";
    require_once "../api/info_api.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php

    // exit(var_dump($_SESSION['user_name']));
    
    include "views/header.php";
    
    ?>
    <div class="container-fluid " style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-3 text-center mt-4">
                <div class="card">
                    <div class="card-header text-center">
                        Staff
                    </div>
                    <div class="card-body">
                        <?php  echo info_count();?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center mt-4">
                <div class="card">
                    <div class="card-header">
                        Pateints
                    </div>
                    <div class="card-body">
                        <?php  echo info_count();?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center mt-4">
                <div class="card">
                    <div class="card-header">
                        Beds
                    </div>
                    <div class="card-body">
                        <?php  echo info_count();?>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</body>
</html>