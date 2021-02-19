<?php
require_once "../database/connection.php";
require_once "../api/info_api.php";
require_once "../api/patient_api.php";

$id = (int)$_GET['id'];
patients_update_updated_at($id);
$patient_query = patient_get_by_id($id);


if(isset($_POST['update'])){
    $sub_Priority = $_POST['sub_Priority'];
    $id = $_POST['id'];
    patients_update_sub_Priority($id,$sub_Priority);
    
    exit("success");
    // header("location ");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" require>
        <input type="hidden" name="id" value="<?=$id?>">
        <select name="sub_Priority" id="sub_Priority">
            <option value="" selected disabled> Please Select status </option>
            <option value="critical">critical</option>
            <option value="unstable">unstable</option>
            <option value="stable">stable</option>
        </select>

        <input type="submit" name="update">
    </form>
</body>
</html>