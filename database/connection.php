<?php

const host = 'localhost';
const user_name = 'root';
const user_password = '';
const database = 'heart_beat';

@ $db = mysqli_connect(host,user_name,user_password,database) ;

if(!is_object($db)){
    //To Do ::
    //return 401 connection error
    header("location: http://localhost/heart_beat/views/errors/402.php");
    exit();
}    


?>