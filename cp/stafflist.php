<?php
session_start();
require_once "../database/connection.php";
require_once "../api/info_api.php";

if(!isset($_SESSION['user_id'])){
    exit('402 Forbiden');
}

 $information = info_get();
//  exit(var_dump($information));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include "views/header.php"?>
    <div class="container-fluid " style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center mt-4">
                <?php
                
                if(isset($_SESSION['success_delete_staff'])){

                ?>

                <div class="alert alert-danger" role="alert">
                    <?=$_SESSION['success_delete_staff']?>
                </div>

                <?php } unset($_SESSION['success_delete_staff']); ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Specialization</th>
                        <!-- Specialization -->
                        <th scope="col">Salaries</th>
                        <th scope="col">WorkHours</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>


                    </tr>
                    </thead>
                    <tbody>
                       
                        <?php

                        while ($info = mysqli_fetch_array($information)){
                        ?>
                    <tr> 
                        <th scope="row"><?=$info['id']?></th>
                        <td><?=$info['Name']?></td>
                        <td><?=$info['Email']?></td>
                        <td><?=$info['Address']?></td>
                        <td><?=$info['Specialization']?></td>
                        <td><?=$info['Salaries']?></td>
                        <td><?=$info['WorkHours']?></td>
                        <td> <a href="edit_staff.php?id=<?=$info['id']?>"> Edit </a> </td>
                        <td><a href="del_staff.php?id=<?=$info['id']?>"> Delete </a></td>
                        
                    </tr>

                    <?php }; ?>
                    
                    </tbody>
                </table>

            </div>

            

        </div>
    </div>
</body>
</html>