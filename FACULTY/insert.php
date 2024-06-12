<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $c_id = $_POST['c_id'];
    $c_name = $_POST['c_name'];
    $c_dept = $_POST['c_dept'];
    $c_contact = $_POST['c_contact'];

    $sql = "INSERT INTO `coordinator` (c_id, c_name, c_dept, c_contact) 
            VALUES ('$c_id', '$c_name', '$c_dept', '$c_contact')";
            
    $result = mysqli_query($con, $sql);
    
    if($result) {
        header('Location: index.php');
        exit();
    } else {
        die("Error: " . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #222; /* Dark background color */
            color: #fff; /* Text color */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Workshop Details</h2>
    <form method="post">
        <div class="mb-3">
            <input type="text" class="form-control" id="c_id" name="c_id" placeholder="Faculty ID" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Faculty name" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="c_dept" name="c_dept" placeholder="Faculty department" required>
        </div>
        <div class="mb-3">
            <input type="phonenumber" class="form-control" id="c_contact" name="c_contact" placeholder="Faculty contact" required>
        </div>
        <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
