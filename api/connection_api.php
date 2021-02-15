<?php

require_once "./database/connection.php";

function db_connection_close(){
    global $db;
    try{
        mysqli_close($db);
    }catch(Exception $ex){
        $ex->getMessage();
    }


    die('connection is closed');
}