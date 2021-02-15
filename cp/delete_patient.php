<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}

require_once "../database/connection.php";



$id = $_GET['id'];


$do = mysqli_query($db,"DELETE  FROM patient_data WHERE id =".$id);


if($do){
    $_SESSION['success_delete_patient'] = " Patient Has Been Deleted Successfuly ...! ";
}else{
    $_SESSION['error_delete_staff'] = " Error Deleting Staff ";
}

header("location: patientlist.php")

?>