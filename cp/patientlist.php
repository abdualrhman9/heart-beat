<?php
session_start();
require_once "../database/connection.php";
require_once "../api/patient_api.php";

if(!isset($_SESSION['user_id'])){
    exit('402 Forbiden');
}

 $information = patients_get();
//  exit(var_dump($information));       

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff List</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="./js/jquery.min.js"></script>
    <!-- Popper JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <script src="./js/propper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="./js/bootstrap.min.js"></script>
</head>
<body>
    <?php include "views/header.php"?>
    <div class="container-fluid " style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center mt-4">
            <?php
                
                if(isset($_SESSION['success_delete_patient'])){

                ?>

                <div class="alert alert-danger" role="alert">
                    <?=$_SESSION['success_delete_patient']?>
                </div>

                <?php } unset($_SESSION['success_delete_patient']); ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Telephone</th>
                        <!-- Specialization -->
                        <th scope="col">Gender</th>
                        <th scope="col">Priority</th>
                        <th scope="col">BloodGroup</th>
                        <th scope="col">MedicalHistory</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>


                    </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                        $i = 1;
                        while ($info = mysqli_fetch_array($information)){
                        ?>
                    <tr> 
                        <th scope="row"><?=$i?></th>
                        <td><?=$info['Name']?></td>
                        <td><?=$info['Email']?></td>
                        <td><?=$info['Address']?></td>
                        <td><?=$info['Telephone']?></td>
                        <td><?=$info['Gender']?></td>
                        <?php $i++; ?>
                        
                        <?php
                        
                            switch($info['Priority']){
                                case "A";
                                    echo "<td style='background: #f44336'>".$info['Priority']."</td>";
                                break;  
                                case "B";
                                    echo "<td style='background: #ffeb3b'>".$info['Priority']."</td>";
                                break;  
                                case "C";
                                    echo "<td style='background: ##4caf50'>".$info['Priority']."</td>";
                                break;  

                                default;
                                echo "<td style='background: #f44336'>".$info['Priority']."</td>";


                                    
                            }

                        ?>
                        <td><?=$info['BloodGroup']?></td>
                        <td><?=$info['MedicalHistory']?></td>
                        <td> <a href="edit_patient.php?id=<?=$info['id']?>">edit </a> </td>
                        <td><a href="delete_patient.php?id=<?=$info['id']?>">delete </a></td>

                        <?php if(hasExamination($info['id'])) { ?>
                        <td>
                            <a href="#">Preview Examination</a>
                        </td>
                        <?php } else {?>
                        <td>
                            <a href="newexamination.php?id=<?=$info['id']?>">Add New Examination</a>
                        </td>
                        <?php  }?>
                    </tr>

                    <?php }; ?>
                    
                    </tbody>
                </table>

            </div>

            

        </div>
    </div>
</body>
</html>