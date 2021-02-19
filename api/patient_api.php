<?php
require_once "../database/connection.php";
//Used To Create Paient Data
function patient_add($name,$email,$address,$telephone,$age,$gender,$height,$weight,$bloodgroup,$patientetails,$medicalhistory,$priority){
    global $db;
                                                                                                                                  //BloodGroup                                          
    $query = mysqli_query($db,"INSERT INTO `patient_data` (`id`,`Name`,`Email`,`Address`,`Telephone`,`Age`,`Gender`,`Height`,`Weight`,`BloodGroup`,`PatientDetails`,`MedicalHistory`,`Priority`) VALUES(null,'$name','$email','$address','$telephone','$age','$gender','$height','$weight','$bloodgroup','$patientetails','$medicalhistory','$priority')") or die(mysqli_error($db));

    if(!$query){
        return false;
    }

    return true;
}


function patients_update_updated_at($id){
    global $db ;
    $query = mysqli_query($db,"UPDATE  `patient_data` SET `updated_at` ='".time()."' WHERE `id` = ".$id);
    if($query){
        return true;
    }
    return false;
}

function patients_update_sub_Priority($id,$value){
    global $db ;
    $query = mysqli_query($db,"UPDATE  `patient_data` SET `sub_Priority` ='".$value."' WHERE `id` = ".$id);
    if($query){
        return true;
    }
    return false;
}

function patients_get(){
    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `patient_data` ORDER BY `sub_Priority` DESC ");
    if(!$query ){
        return false;
    }

    if(mysqli_num_rows($query) > 0){
        // $informations = mysqli_fetch_array($query);
        return $query;
    }

    return $query;

    
}


function patient_get_by_id($id){
    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `patient_data` WHERE id = $id");


    return $query;

}

function patient_get_by_name($name){

    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `patient_data` WHERE Name = $name");
    if(!$query ){
        return false;
    }

    if(mysqli_num_rows($query) > 0){
        $user = mysqli_fetch_array($query);
        return $user;
    }

    return null;


}

function patient_get_by_email($email){
    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `patient_data` WHERE Email = '$email'") or die(mysqli_error($db));
    
    return $query;

}

function patient_count(){
    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `patients_data` ");

    return mysqli_num_rows($query);
}

function patient_name($id){
    global $db ;
    // $query = mysqli_query($db,"SELECT * FROM `patients_data`  WHERE `id` = ".$id);
    $query = mysqli_query($db,"SELECT * FROM `patient_data` WHERE id = '$id'") or die(mysqli_error($db));
    // exit(var_dump($query));
    $patient = mysqli_fetch_array($query);

    return $patient['Name'];
}



function hasExamination($id){
    global $db;

    $query = mysqli_query($db,"SELECT * FROM `examination` WHERE `p_id` = ".$id);

    if(mysqli_num_rows($query) > 0){
        return true;
    }

    return false;
}

function pateints_count(){
    global $db;
    $query = mysqli_query($db,"SELECT * FROM `patient_data` ");
    $count = mysqli_num_rows($query);

    return $count;
}


