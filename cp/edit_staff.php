<?php
session_start();
require_once "../database/connection.php";
require_once "../api/info_api.php";

if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}

$id = $_GET['id'];
$informations = mysqli_query($db,"SELECT * FROM informations WHERE id =".$id);

$info = mysqli_fetch_array($informations);

if(isset($_POST['edit'])){
    // exit('editting');

$name = $_POST['name'];

$email = $_POST['email'];

$address = $_POST['address'];

$specialization = $_POST['specialization'];

$workhours = $_POST['workhours'];

$salaries = $_POST['salaries'];

$attendenceTime = $_POST['attendencetime'];



$add =  mysqli_query($db,"UPDATE informations SET `Name` = '$name',
                            `Email` = '$email', `Address`='$address',
                            `Specialization`='$specialization',
                            `WorkHours`='$workhours',
                            `Salaries`='$salaries',
                            `AttendanceTime`='$attendenceTime' WHERE id =".$id) or die (mysqli_error($db));

if($add){
    header("location: stafflist.php");
}else{
    header("location: views/errors/402.php");
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit <?=$info['Name']?> Information</title>
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
<body>

<?php

include "views/header.php";

?>

<div class="container-fluid " style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center mt-4">
                <div class="card">
                    <div class="card-header">
                    Edit <?=$info['Name']?> Information
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input required type="email" class="form-control" id="inputEmail4" placeholder="Email" value="<?=$info['Email']?>" name="email">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputname4">name</label>
                                <input required type="text" class="form-control" id="inputname4" placeholder="name" value="<?=$info['Name']?>" name="name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputAddress">Address</label>
                                    <input required type="text" class="form-control" value="<?=$info['Address']?>" id="inputAddress" placeholder="1234 Main St" name="address">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="attendenceTime">Attendenace Time</label>
                                    <input required type="text" class="form-control" id="attendenceTime" placeholder="12:00 am" value="<?=$info['AttendanceTime']?>" name="attendencetime">
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- <label for="inputAddress2">Address 2</label>
                                <input required type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"> -->
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputCity">Work Hours</label>
                                <input required type="number" min="5" max="24" value="<?=$info['WorkHours']?>" class="form-control" id="inputCity" name="workhours">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputState">specialization</label>
                                <select id="inputState" class="form-control" name="specialization">
                                    <option disabled >Choose...</option>
                                    <option value="Nurse"  <?php if($info['Specialization'] == "Nurse"){echo "selected";}else{echo "";}?> >Nurse</option>
                                    <option value="Doctor" <?php if($info['Specialization'] == "Doctor"){echo "selected";}else{echo "";}?> > Doctor </option>
                                    
                                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <label for="inputZip">Salaries</label>
                                <input required type="number" min="1000" value="<?=$info['Salaries']?>" class="form-control" id="inputZip" name="salaries">
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
                            <button type="submit" class="btn btn-primary" name="edit"> Edit </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    
</body>
</html>