<?php
    include 'connect.php';
if(isset($_POST['submit'])){
    $person_id=$_POST['person_id'];
    $p_name=$_POST['p_name'];
    $p_contact=$_POST['p_contact'];
    $title_of_position=$_POST['title_of_position'];
    $p_expertise=$_POST['p_expertise'];

    $sql="insert into `resource_person`(person_id,p_name,p_contact,title_of_position,p_expertise)
    values('$person_id',',$p_name','$p_contact','$title_of_position','$p_expertise')";
    $result=mysqli_query($con,$sql);
    if($result){
         header('location:index.php');
        echo "connection successful";
    }else{
        die(mysqli_error($con));
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
    <h2 class="text-center mb-4">Resource person Details</h2>
    <form method="post">
    <div class="mb-3" dark>
            <input type="text" class="form-control" id="person_id" name="person_id" placeholder="Resource Person ID" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Resource Person name" required>
        </div>
        <div class="mb-3">
            <input type="Phonenumber" class="form-control" id="p_contact" name="p_contact" placeholder="Contact info" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="title_of_position" name="title_of_position" placeholder="Title of position" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="p_expertise" name="p_expertise" placeholder="expertise" required>
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
