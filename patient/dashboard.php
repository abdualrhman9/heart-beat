<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header("location: index.php");
    }
    require_once "../database/connection.php";
    require_once "../api/patient_api.php";

    $user = patient_get_by_id($_SESSION['user_id']);

    $info = mysqli_fetch_array($user);

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
            
        <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4> <?=$info['Name']?></h4>
                      <p class="text-secondary mb-1">Heart Patient</p>
                      <p class="text-muted font-size-sm"><?=$info['Address']?></p>
                      <hr>
                      <button class="btn btn-<?php if($info['Priority'] =="A" ) echo "danger"; elseif($info['Priority']=="B") echo "warning"; else echo "success"; ?>"><?=$info['Priority']?></button>
                      <!-- <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  
                 
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> height </h6>
                    <span class="text-secondary"><?=$info['Height']?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> Weight </h6>
                    <span class="text-secondary"><?=$info['Weight']?></span>
                  </li>
                </ul>
              </div>



             
            </div>





            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$info['Name']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$info['Email']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$info['Telephone']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$info['Address']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Age</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$info['Age']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$info['Gender']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Bllod Group</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$info['BloodGroup']?>
                    </div>
                  </div>


                </div>
              </div>
            </div>




            <div class="col-md-8 mt-2">

              <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0">Medical History</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                      <?=$info['MedicalHistory']?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0">Patient Details</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                      <?=$info['PatientDetails']?>
                    </div>
                </div>

            </div>




            

            
            
        </div>
    </div>
</body>
</html>