<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}

require_once "../database/connection.php";
require_once "../api/patient_api.php";

$query = mysqli_query($db,"SELECT * FROM  examination WHERE p_id = ".$_GET['id']);

if(mysqli_num_rows($query) <= 0){
    $new = true;
}else{
    $new = false;
    $info = mysqli_fetch_array($query);

}

$p = patient_get_by_id($_GET['id']);
$p_resulte = mysqli_fetch_array($p);
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
    <?php if(!$new) {?>
        <div class="row justify-content-center">
            
       
            <div class="col-md-12 text-center mb-4">
                <h1> <?=$p_resulte['Name']?> </h1>
            </div>

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Vital Signs</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      
                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Heart Rate</h6>
                                <?=$info['heart_rate']?>
                            </div>

                            <div class="col-sm-2">
                                <h6 class="mb-0">Respiratory</h6>
                                <?=$info['respiratory']?>
                            </div>


                            <div class="col-sm-2">
                                <h6 class="mb-0">Blood Preasure</h6>
                                <?=$info['blood_preasure']?>
                            </div>

                            <div class="col-sm-2">
                                <h6 class="mb-0">O2 Sat</h6>
                                <?=$info['oxgen_saturation']?>
                            </div>

                            <div class="col-sm-2">
                                <h6 class="mb-0">temp</h6>
                                <?=$info['temp']?>
                            </div>
                    

                        </div>



                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Physical Examination</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$info['physical_examination']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Electro Graphic</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <img src="<?=$info['electro_graphic']?>" class="card-img">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Echo Cardio Gram</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <img src="<?=$info['echo_cardio_gram']?>" class="card-img">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Coronary Angiogram</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <img src="<?=$info['coronary_angiogram']?>" class="card-img">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Cardic Stress Test</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <img src="<?=$info['cardic_stress_test']?>" class="card-img">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Seram Cardic Biomarkers</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                         <img src="<?=$info['seram_cardic_biomarkers']?>" class="card-img">
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Seram Cardic Biomarkers</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                         <img src="<?=$info['holter_ecg']?>" class="card-img">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Seram Cardic Biomarkers</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                         <img src="<?=$info['ekg']?>" class="card-img">
                    </div>
                  </div>


                </div>
              </div>
            </div>




            



            

            
            
        </div>

    <?php } else{ ?>
        

        <div class="row justify-content-center">


            <div class="col-md-12 mt-4">
               
                <a href="newexam.php?id=<?=$_GET['id']?>"> Create New Examination </a>

            </div>


        </div>




    <?php } ?>
    </div>
</body>
</html>