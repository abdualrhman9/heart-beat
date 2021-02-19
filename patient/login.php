<?php
session_start();
require_once "../database/connection.php";
require_once "../api/patient_api.php";
$email = $_POST['email'];


$password = $_POST['password'];

$user = patient_get_by_email($email);

$user = mysqli_fetch_array($user);
if(!empty($user)){
    if($user['id'] == $password){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['Name'];
        $_SESSION['user_email'] = $user['Email'];
        header("location: dashboard.php");
        exit();
    }else {
        $_SESSION['login_error'] = "تاكد من كلمة المرور واو البريد الالكتروني";
        header("location: index.php");
        exit();
    }
}else {
    $_SESSION['login_error'] = "تاكد من كلمة المرور او البريد الالكتروني";
    header("location: index.php");
    exit();
}

?>