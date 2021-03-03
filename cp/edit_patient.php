<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}

require_once "../database/connection.php";
require_once "../api/patient_api.php";



$id = $_GET['id'];
$informations = mysqli_query($db,"SELECT * FROM patient_data WHERE id =".$id);

$info = mysqli_fetch_array($informations);


// // exit(var_dump($_POST));

if(isset($_POST['edit'])){
$name = $_POST['name'];

$email = $_POST['email'];

$address = $_POST['address'];

$telephone = $_POST['telephone'];

$age = $_POST['age'];

$gender = $_POST['gender'];

$weight = $_POST['weight'];
$height = $_POST['height'];

$bloodgroup = $_POST['bloodgroup'];

$patientetails = $_POST['patientetails'];

$medicalhistory = $_POST['medicalhistory'];

$priority = $_POST['priority'];

$add =  mysqli_query($db,"UPDATE patient_data SET `Name` = '$name',
                            `Email` = '$email', `Address`='$address',
                            `Telephone`='$telephone',
                            `Age`='$age',
                            `Gender`='$gender',
                            `Weight`='$weight',
                            `Height`='$height',
                            `BloodGroup`='$bloodgroup',
                            `PatientDetails`='$patientetails',
                            `MedicalHistory`='$medicalhistory',
                            `Priority`='$priority' WHERE id =".$id) or die (mysqli_error($db));

if($add){
    header("location: patientlist.php");
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
    <title>Add New Patient</title>
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
                        Add New Patient 
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input required type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?=$info['Email']?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputname4">name</label>
                                <input required type="text" class="form-control" id="inputname4" placeholder="name" name="name" value="<?=$info['Name']?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputAddress">Address</label>
                                    <input required type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="<?=$info['Address']?>">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="attendenceTime">Telephone</label>
                                    <input required type="text" class="form-control" id="attendenceTime" placeholder="+249 9xxxxxxxx" am" name="telephone" value="<?=$info['Telephone']?>">
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- <label for="inputAddress2">Address 2</label>
                                <input required type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"> -->
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputCity">Age</label>
                                <input required type="number" min="1"  value="<?=$info['Age']?>" class="form-control" id="inputCity" name="age">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputState">Gender</label>
                                <select id="inputState" class="form-control" name="gender">
                                    <option disabled selected>Choose...</option>
                                    <option value="male"   <?php if($info['Gender'] == "male") echo "selected";  ?> >male</option>
                                    <option value="female" <?php if($info['Gender'] == "female") echo "selected";  ?> > femal </option>
                                    
                                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <label for="inputZip">weight</label>
                                <input required type="number" min="10" value="<?=$info['Weight']?>" class="form-control" id="inputZip" name="weight">
                                </div>
                                <div class="form-group col-md-2">
                                <label for="inputZip">height</label>
                                <input required type="number" min="1" value="<?=$info['Height']?>" class="form-control" id="inputZip" name="height">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputState">Blood Group</label>
                                <select id="inputState" class="form-control" name="bloodgroup">
                                    <option disabled selected>Choose...</option>
                                    <option value="A"  <?php if($info['BloodGroup'] == "A") echo "selected"; ?>>A</option>
                                    <option value="A+" <?php if($info['BloodGroup'] == "A+") echo "selected"; ?>>A+</option>
                                    <option value="B"  <?php if($info['BloodGroup'] == "B") echo "selected"; ?>> B </option>
                                    <option value="B+" <?php if($info['BloodGroup'] == "B+") echo "selected"; ?>> B+ </option>
                                    <option value="O"  <?php if($info['BloodGroup'] == "O") echo "selected"; ?>> O </option>
                                    <option value="O+" <?php if($info['BloodGroup'] == "O+") echo "selected"; ?>> O+ </option>
                                    <option value="AB" <?php if($info['BloodGroup'] == "AB") echo "selected"; ?>> AB </option>
                                    
                                </select>
                                </div>

                                <div class="form-group col-md-6">
                                <label for="inputState">PatientDetails</label>
                                <textarea name="patientetails" id="" rows="5" class="form-control"><?=$info['PatientDetails']?></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                <label for="inputState">MedicalHistory</label>
                                <textarea name="medicalhistory" cols="3" rows="5" id="" class="form-control"><?=$info['MedicalHistory']?></textarea>
                                </div>

                                <div class="form-group col-md-2">
                                <label for="inputState">Priority</label>
                                <select id="inputState" class="form-control" name="priority">
                                    <option disabled selected>Choose...</option>
                                    <option value="A" <?php if($info['Priority'] == "A") echo "selected";?>> A </option>
                                    <option value="B" <?php if($info['Priority'] == "B") echo "selected";?>> B </option>
                                    <option value="C" <?php if($info['Priority'] == "C") echo "selected";?>> C </option>
                                    
                                </select>
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
                            <input type="hidden" name="edit" value="edit">
                            <button type="submit" class="btn btn-primary" > Add </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    
</body>
</html>