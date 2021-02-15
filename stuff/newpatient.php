<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Patient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                        Add New Patient 
                    </div>
                    <div class="card-body">
                        <form action="addnewpatient.php" method="POST">
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
                                    <label for="attendenceTime">Telephone</label>
                                    <input required type="text" class="form-control" id="attendenceTime" placeholder="+249 9xxxxxxxx" am" name="telephone">
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- <label for="inputAddress2">Address 2</label>
                                <input required type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"> -->
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputCity">Age</label>
                                <input required type="number" min="1"  value="1" class="form-control" id="inputCity" name="age">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputState">Gender</label>
                                <select id="inputState" class="form-control" name="gender">
                                    <option disabled selected>Choose...</option>
                                    <option value="male" >male</option>
                                    <option value="female" > femal </option>
                                    
                                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <label for="inputZip">weight</label>
                                <input required type="number" min="1000" value="1000" class="form-control" id="inputZip" name="weight">
                                </div>
                                <div class="form-group col-md-2">
                                <label for="inputZip">height</label>
                                <input required type="number" min="1000" value="1000" class="form-control" id="inputZip" name="height">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputState">Blood Group</label>
                                <select id="inputState" class="form-control" name="bloodgroup">
                                    <option disabled selected>Choose...</option>
                                    <option value="A" >A</option>
                                    <option value="A+" >A+</option>
                                    <option value="B" > B </option>
                                    <option value="B+" > B+ </option>
                                    <option value="O" > O </option>
                                    <option value="O+" > O+ </option>
                                    <option value="AB" > AB </option>
                                    
                                </select>
                                </div>

                                <div class="form-group col-md-6">
                                <label for="inputState">PatientDetails</label>
                                <textarea name="patientetails" id="" rows="5" class="form-control"></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                <label for="inputState">MedicalHistory</label>
                                <textarea name="medicalhistory" cols="3" rows="5" id="" class="form-control"></textarea>
                                </div>

                                <div class="form-group col-md-2">
                                <label for="inputState">Priority</label>
                                <select id="inputState" class="form-control" name="priority">
                                    <option disabled selected>Choose...</option>
                                    <option value="A" > A </option>
                                    <option value="B" > B </option>
                                    <option value="C" > C </option>
                                    
                                </select>
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