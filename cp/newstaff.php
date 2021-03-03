<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Staff</title>
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

<?php

include "views/header.php";

?>

<div class="container-fluid " style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center mt-4">
                <div class="card">
                    <div class="card-header">
                        Add New Staff
                    </div>
                    <div class="card-body">
                        <form action="addnewStaff.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input required type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputname4">name</label>
                                <input required type="text" class="form-control" id="inputname4" placeholder="name" name="name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputAddress">Address</label>
                                    <input required type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="attendenceTime">Attendenace Time</label>
                                    <input required type="text" class="form-control" id="attendenceTime" placeholder="12:00 am" name="attendencetime">
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- <label for="inputAddress2">Address 2</label>
                                <input required type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"> -->
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputCity">Work Hours</label>
                                <input required type="number" min="5" max="24" value="5" class="form-control" id="inputCity" name="workhours">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputState">specialization</label>
                                <select id="inputState" class="form-control" name="specialization">
                                    <option disabled selected>Choose...</option>
                                    <option value="Nurse" >Nurse</option>
                                    <option value="Doctor" > Doctor </option>
                                    
                                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <label for="inputZip">Salaries</label>
                                <input required type="number" min="1000" value="1000" class="form-control" id="inputZip" name="salaries">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                <!-- <input required class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label> -->
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"> Add </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    
</body>
</html>