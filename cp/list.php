<?php

session_start();


if(!isset($_SESSION['user_id'])){
    exit('not set');
}else{
    exit('isset');
}


?>