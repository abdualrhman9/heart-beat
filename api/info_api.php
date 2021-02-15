<?php
require_once "../database/connection.php";
//Used To Create Paient Data
function info_add($name,$email,$address,$specialization,$workHours,$salaries,$attendanceTime){
    global $db;

    $query = mysqli_query($db,"INSERT INTO `informations` (`Name`,`Email`,`Address`,`Specialization`,`WorkHours`,`Salaries`,`AttendanceTime`)
                    VALUES('$name','$email','$address','$specialization','$workHours','$salaries','$attendanceTime')");

    if(!$query){
        return false;
    }

    return true;
}


function info_get(){
    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `informations` ");
    if(!$query ){
        return false;
    }

    if(mysqli_num_rows($query) > 0){
        // $informations = mysqli_fetch_array($query);
        return $query;
    }

    return $query;

    
}


function info_get_by_id($id){
    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `informations` WHERE id = $id");
    if(!$query ){
        return false;
    }

    if(mysqli_num_rows($query) > 0){
        $user = mysqli_fetch_array($query);
        return $user;
    }

    return null;

}

function info_get_by_name($name){

    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `informations` WHERE Name = $name");
    if(!$query ){
        return false;
    }

    if(mysqli_num_rows($query) > 0){
        $user = mysqli_fetch_array($query);
        return $user;
    }

    return null;


}

function info_get_by_email($email){
    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `informations` WHERE Email = '$email'") or die(mysqli_error($db));

    return $query;

    

}

function info_count(){
    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `informations` ");

    return mysqli_num_rows($query);
}





