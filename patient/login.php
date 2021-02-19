<?php
session_start();
require_once "../database/connection.php";
require_once "../api/patient_api.php";
$email = $_POST['email'];

if(isset($_SSION['user_id'])){
    header("location: dashboard.php");
}

$password = $_POST['password'];

$user_query = patient_get_by_email($email);

$user = mysqli_fetch_array($user_query);
if(mysqli_num_rows($user_query) > 0){
    if($password == $user['id']){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['Name'];
        $_SESSION['user_email'] = $user['Email'];
        header("location: dashboard.php");
        exit();
    }else {
        $_SESSION['login_error'] = "تاكد من كلمة المرور واو البريد الالكتروني";
        // session_unset();
        header("location: /");
        exit();
    }
}else {
    $_SESSION['login_error'] = "تاكد من كلمة المرور او البريد الالكتروني";
    // session_unset();
    header("location: /");
    exit();
}

?>