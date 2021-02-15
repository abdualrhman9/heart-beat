<?php

require_once "../database/connection.php";

function users_add($name,$email,$address,$telephone,$password,$loginTime){
    global $db ;

    $query = mysqli_query($db,"INSERT INTO `users` (`UserName`,`Email`,`Address`,`Telephone`,`Password`,`LoginTime`)
             Values('$name','$email','$address','.$telephone','$password.','$loginTime')");

    
    if(!$query){
        exit('sql error');
    }

    return true;
            
}

function users_get(){
    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `users` ");
    if(!$query ){
        return false;
    }

    if(mysqli_num_rows($query) > 0){
        $users = mysqli_fetch_array($query);
        return $users;
    }

    return null;

    
}

function users_get_by_id($id){
    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `users` WHERE id = $id");
    if(!$query ){
        return false;
    }

    if(mysqli_num_rows($query) > 0){
        $user = mysqli_fetch_array($query);
        return $user;
    }

    return null;

}

function users_get_by_name($name){

    global $db ;

    $query = mysqli_query($db,"SELECT * FROM `users` WHERE Name = $name");
    if(!$query ){
        return false;
    }

    if(mysqli_num_rows($query) > 0){
        $user = mysqli_fetch_array($query);
        return $user;
    }

    return null;


}

function users_get_by_email($email){
    global $db ;
    $query = mysqli_query($db,"SELECT * FROM `users` WHERE Email = '$email'");
    if(!$query ){
        return false;
    }

    if(mysqli_num_rows($query) > 0){
        $user = mysqli_fetch_array($query);
        return $user;
    }

    return null;

}

function users_delete_by_id($id){
    global $db ;

    $query = mysqli_query($db,"DELETE  FROM `users` WHERE id = $id");
    if(!$query ){
        return false;
    }

    return TRUE;

}

function users_delete_by_name($name){

    global $db ;

    $query = mysqli_query($db,"DELETE  FROM `users` WHERE Name = $name");
    if(!$query ){
        return false;
    }
    return true;


}


function users_update($name,$email,$address,$telephone,$password){
    global $db ;

    $query = mysqli_query($db,"UPDATE `users` SET `UserName` =  '$name' , `Email` = '$email' , `Address` = '$address' ,`Telephone` = '$telephone' ,`Password`='$password' ");


    
    if(!$query){
        exit('sql error');
    }

    return true;
            
}


// $user = users_get_by_email("Hassan123@mail.com");

// exit(var_dump($user));




