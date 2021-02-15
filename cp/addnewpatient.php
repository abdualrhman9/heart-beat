<?php

require_once "../database/connection.php";
require_once "../api/patient_api.php";


// exit(var_dump($_POST));
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



$add =  patient_add($name,$email,$address,$telephone,$age,$gender,$height,$weight,$bloodgroup,$patientetails,$medicalhistory,$priority);

if($add){
    header("location: dashboard.php");
}else{
    header("location: views/errors/402.php");
}