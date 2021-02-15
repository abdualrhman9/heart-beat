<?php

require_once "../database/connection.php";
require_once "../api/info_api.php";


// exit(var_dump($_POST));
$name = $_POST['name'];

$email = $_POST['email'];

$address = $_POST['address'];

$specialization = $_POST['specialization'];

$workhours = $_POST['workhours'];

$salaries = $_POST['salaries'];

$attendenceTime = $_POST['attendencetime'];



$add =  info_add($name,$email,$address,$specialization,$workhours,$salaries,$attendenceTime);

if($add){
    header("location: dashboard.php");
}else{
    header("location: http://localhost/views/errors/402.php");
}