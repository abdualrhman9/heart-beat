<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header("location: index.php");
    }
    require_once "../database/connection.php";
    require_once "../api/info_api.php";
    require_once "../api/patient_api.php";
    
    $patients_query = patients_get();
    $time = time();
    
    // exit(var_dump($time-1613751937));
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="./js/jquery.min.js"></script>
    <!-- Popper JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <script src="./js/propper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="./js/bootstrap.min.js"></script>
</head>
<body style="background-color: #376b5f;">

    <?php

    // exit(var_dump($_SESSION['user_name']));
    
    include "views/header.php";
    
    ?>
    <div class="container-fluid " style="margin-top: 100px;">
        
        <div class="row">

            <div class="col-md-8">

            <?php  while($patient = mysqli_fetch_array($patients_query)){ ?>
                <?php if($time - $patient['updated_at'] >= 86400 ) { ?>
                    <div class="alert alert-danger" role="alert">
                        <p> Update required for patient: <?=$patient['Name']?>  </p>
                        <a href="updatePatient.php?id=<?=$patient['id']?>"> Update </a>
                    </div>
                <?php } ?>
            <?php } ?>

            </div>

        </div>
            
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
            
        </div>
    </div>
        
        
</body>
</html>