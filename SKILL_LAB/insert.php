<?php
    include 'connect.php';
if(isset($_POST['submit'])){
    $skilllab_id=$_POST['skilllab_id'];
    $sl_topic=$_POST['sl_topic'];
    $sl_type=$_POST['sl_type'];
    // $w_time=$_POST['w_time'];
    $sl_start_date=$_POST['sl_start_date'];
    $sl_end_date=$_POST['sl_end_date'];
    $sl_sem=$_POST['sl_sem'];
    $dept_id=$_POST['dept_id'];
    // $person_id=$_POST['person_id'];
    // $c_id=$_POST['c_id'];

    $sql="insert into `skill_lab`(skilllab_id,sl_topic,sl_type,sl_start_date,sl_end_date,sl_sem,dept_id)
    values('$skilllab_id',',$sl_topic','$sl_type','$sl_start_date','$sl_end_date','$sl_sem','$dept_id')";
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
    <title>Skill Lab Details</title>
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
    <h2 class="text-center mb-4">Skill Lab Details</h2>
    <form method="post">
    <div class="mb-3" dark>
            <input type="text" class="form-control" id="skilllab_id" name="skilllab_id" placeholder="Skill Lab ID" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="sl_topic" name="sl_topic" placeholder="Skill Lab Topic" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="sl_type" name="sl_type" placeholder="Skill Lab Type" required>
        </div>
        
        <div class="mb-3">
            <input type="date" class="form-control" id="sl_start_date" name="sl_start_date" placeholder="Skill Lab Start Date" required>
        </div>
        <div class="mb-3">
            <input type="date" class="form-control" id="sl_end_date" name="sl_end_date" placeholder="Skill Lab End Date" required>
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" id="sl_sem" name="sl_sem" placeholder="Skill Lab Semester" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="dept_id" name="dept_id" placeholder="Department ID" required>
        </div>
        <!-- <div class="mb-3">
            <input type="text" class="form-control" id="person_id" name="person_id" placeholder="Resource Person ID" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="c_id" name="c_id" placeholder="Coordinator ID" required>
        </div> -->
        <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
