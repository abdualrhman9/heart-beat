<?php
session_start();
require_once "../database/connection.php";
require_once "../api/patient_api.php";

$user = patient_get_by_id($_GET['id']);
$info = mysqli_fetch_array($user);
// var_dump($info);

if(isset($_POST['create'])){
    // exit(var_dump($_POST));
    $P_ID = $_POST['p_id'];
    $heart_rate = $_POST['heart_rate'];
    $respiratory = $_POST['respiratory'];
    $blood_preasure = $_POST['blood_preasure'];
    $oxgen_saturation = $_POST['oxgen_saturation'];
    $temp = $_POST['temp'];
    $physical_examination = $_POST['physical_examination'];

    //Upload File
    $target_dir = "uploads/";
    if(isset($_FILES['electro_graphic'])){
        if(move_uploaded_file($_FILES['electro_graphic']['tmp_name'], $target_dir.basename($_FILES['electro_graphic']['name']))){
        $electo_graphic = $target_dir.basename($_FILES['electro_graphic']['name']); 
        }
    }else{
        $electo_graphic = null;
    }    
    if(isset($_FILES['echo_cardio_gram'])){
        if(move_uploaded_file($_FILES['echo_cardio_gram']['tmp_name'], $target_dir.basename($_FILES['echo_cardio_gram']['name']))){
        $echo_cardio_gram = $target_dir.basename($_FILES['echo_cardio_gram']['name']); 
        }
    }else{
        $echo_cardio_gram =null;
    }    
    if(isset($_FILES['coronary_angiogram'])){
        if(move_uploaded_file($_FILES['coronary_angiogram']['tmp_name'], $target_dir.basename($_FILES['coronary_angiogram']['name']))){
        $coronary_angiogram = $target_dir.basename($_FILES['coronary_angiogram']['name']); 
        }
    }else{
        $coronary_angiogram = null;
    }    
    if(isset($_FILES['cardic_stress_test'])){
        if(move_uploaded_file($_FILES['cardic_stress_test']['tmp_name'], $target_dir.basename($_FILES['cardic_stress_test']['name']))){
        $cardic_stress_test = $target_dir.basename($_FILES['cardic_stress_test']['name']); 
        }
    }else{
        $cardic_stress_test = null;
    }    
    if(isset($_FILES['seram_cardic_biomarkers'])){
        if(move_uploaded_file($_FILES['seram_cardic_biomarkers']['tmp_name'], $target_dir.basename($_FILES['seram_cardic_biomarkers']['name']))){
        $seram_cardic_biomarkers = $target_dir.basename($_FILES['seram_cardic_biomarkers']['name']); 
        }
    }else{
        $seram_cardic_biomarkers = null;
    }    
    if(isset($_FILES['holter_ecg'])){
        if(move_uploaded_file($_FILES['holter_ecg']['tmp_name'], $target_dir.basename($_FILES['holter_ecg']['name']))){
        $holter_ecg = $target_dir.basename($_FILES['holter_ecg']['name']); 
        }
    }else{
        $holter_ecg =null;
    }    
    if(isset($_FILES['ekg'])){
        if(move_uploaded_file($_FILES['ekg']['tmp_name'], $target_dir.basename($_FILES['ekg']['name']))){
        $ekg = $target_dir.basename($_FILES['ekg']['name']); 
        }
    }else{
        $ekg = null;
    }    

    // $electo_graphic = $_POST['electro_graphic'];
    // $echo_cardio_gram = $_POST['echo_cardio_gram'];
    // $coronary_angiogram = $_POST['coronary_angiogram'];
    // $cardic_stress_test = $_POST['cardic_stress_test'];
    // $seram_cardic_biomarkers =$_POST['seram_cardic_biomarkers'];
    // $holter_ecg = $_POST['holter_ecg'];
    // $ekg = $_POST['ekg'];

    // if(isset($_FILES)){
    //     exit(var_dump($_FILES['electro_graphic']));
    // }

    // exit("INSERT INTO examination (`id`,`p_id`,`heart_rate`,`respiratory`,`blood_preasure`,`oxgen_saturation`,
    // `temp`,`physical_examination`,`electro_graphic`,
    // `echo_cardio_gram`,
    // `coronary_angiogram`,`cardic_stress_test`,
    // `seram_cardic_biomarkers`,
    // `holter_ecg`,`ekg`)  
    // VALUES (NULL,'$P_ID','$heart_rate','$respiratory',
    // '$blood_preasure','$oxgen_saturation',
    // '$temp','$physical_examination','$electo_graphic','$echo_cardio_gram',
    // '$coronary_angiogram','$seram_cardic_biomarkers','$holter_ecg','$ekg') ");

    mysqli_query($db,"INSERT INTO examination (`id`,`p_id`,`heart_rate`,`respiratory`,`blood_preasure`,`oxgen_saturation`,
                                                `temp`,`physical_examination`,`electro_graphic`,
                                                `echo_cardio_gram`,
                                                `coronary_angiogram`,`cardic_stress_test`,
                                                `seram_cardic_biomarkers`,
                                                `holter_ecg`,`ekg`)  
                                                VALUES (NULL,'$P_ID','$heart_rate','$respiratory',
                                                '$blood_preasure','$oxgen_saturation',
                                                '$temp','$physical_examination','$electo_graphic','$echo_cardio_gram',
                                                '$coronary_angiogram','$cardic_stress_test','$seram_cardic_biomarkers','$holter_ecg','$ekg') ") or die(mysqli_error($db));
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Patient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php

include "views/header.php";

?>

<div class="container-fluid " style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center mt-4">
                <div class="card">
                    <div class="card-header">
                        Create Examination For <?=$info['Name']?>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="p_id" value="<?=$_GET['id']?>">
                            <input type="hidden" name="create">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Physical Examination</label>
                                    <textarea required  class="form-control" id="inputEmail4" placeholder="Physical Examination" name="physical_examination"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputname4">Heart rate</label>
                                    <input required type="number" class="form-control" id="inputname4" placeholder="Heart Rate" name="heart_rate">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputAddress">Respiratory</label>
                                    <input required type="number" class="form-control" id="inputAddress" placeholder="respiratory" name="respiratory">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="attendenceTime">Blood Preasure</label>
                                    <input required type="text" class="form-control" id="attendenceTime" placeholder="20/100"  name="blood_preasure">
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- <label for="inputAddress2">Address 2</label>
                                <input required type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"> -->
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputCity">Oxgen Saturation</label>
                                <input required type="number" min="1"  value="1" class="form-control" id="inputCity" name="oxgen_saturation">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputState">Temprature </label>
                                <input id="inputState" class="form-control" type="number" name="temp" placeholder="Temprature">
                                
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputZip">Electo_Graphic</label>
                                <input  type="file"  class="form-control" id="inputZip" name="electro_graphic">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputZip">Cardic Stress Test</label>
                                <input  type="file" min="1000" value="1000" class="form-control" id="inputZip" name="cardic_stress_test">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputState">Echo Cardio Gram</label>
                                <input type="file"  id="inputState" class="form-control" name="echo_cardio_gram">
                                   
                                </div>

                                <div class="form-group col-md-6">
                                <label for="inputState">Coronary Angiogram</label>
                                <input type="file" name="coronary_angiogram" id="" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                <label for="inputState">Seram Cardic Biomarkers</label>
                                <input id="inputState" name="seram_cardic_biomarkers" type="file" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                <label for="inputState">Holter Ecg</label>
                                <input type="file" id="inputState" class="form-control" name="holter_ecg">
                                    
                                </div>

                                <div class="form-group col-md-6">
                                <label for="inputState">Ekg</label>
                                <input type="file"  id="inputState" class="form-control" name="ekg">
                                    
                                </div>
                                




                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                <!-- <input required class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label> -->
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"> Add </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    
</body>
</html>