<?php
session_start();
require_once "../database/connection.php";
require_once "../api/users_api.php";
$email = $_POST['email'];


$password = $_POST['password'];

$user = users_get_by_email($email);
// exit(var_dump($user));
if(!empty($user)){
    if($user['Password'] == $password){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['UserName'];
        $_SESSION['user_email'] = $user['Email'];
        header("location: dashboard.php");
    }else {
        $_SESSION['login_error'] = "تاكد من كلمة المرور واو البريد الالكتروني";
        header("location: /");
    }
}else {
    $_SESSION['login_error'] = "تاكد من كلمة المرور او البريد الالكتروني";
    header("location: /");
}

?>