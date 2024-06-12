
<?php
include 'connect.php';
$id = isset($_GET['updateid']) ? $_GET['updateid'] : null;
$sql = "SELECT * FROM `skill_lab` WHERE skilllab_id='$id'";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error: " . mysqli_error($con));
}
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $sl_topic = $row['sl_topic'];
    $sl_type = $row['sl_type'];
    // $w_time = $row['w_time'];
    $sl_start_date = $row['sl_start_date'];
    $sl_end_date = $row['sl_end_date'];

    $sl_sem = $row['sl_sem'];
    $dept_id = $row['dept_id'];
    // $person_id = $row['person_id'];
    // $c_id = $row['c_id'];
} else {
    echo "No Skill Lab found with the provided ID.";
}
if (isset($_POST['update'])) {
    $sl_topic = $_POST['sl_topic'];
    $sl_type = $_POST['sl_type'];
    // $w_time = $_POST['w_time'];
    $sl_start_date = $_POST['sl_start_date'];
    $sl_end_date = $_POST['sl_end_date'];

    $sl_sem = $_POST['sl_sem'];
    $dept_id = $_POST['dept_id'];
    // $person_id = $_POST['person_id'];
    // $c_id = $_POST['c_id'];
    $sql = "UPDATE `skill_lab` SET sl_topic='$sl_topic', sl_type='$sl_type', sl_start_date='$sl_start_date',sl_end_date='$sl_end_date', sl_sem='$sl_sem', dept_id='$dept_id'  WHERE skilllab_id='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Update successful";
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
    <title>Customer details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark">

<h2 class="text-center mt-4" >UPDATE</h2>

<div class="container">
    <form method="post" class="mx-auto mt-4 p-4 border border-primary rounded bg-white">
        <div class="mb-3">
            <input type="text" id="sl_topic" name="sl_topic" placeholder="Skill Lab Topic" required class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" id="sl_type" name="sl_type" placeholder="Skill Lab Type " required class="form-control">
        </div>
       
        <div class="mb-3">
            <input type="date" id="sl_start_date" name="sl_start_date" placeholder="Skill Lab Start Date" required class="form-control">
        </div>
        <div class="mb-3">
            <input type="date" id="sl_end_date" name="sl_end_date" placeholder="Skill Lab End Date" required class="form-control">
        </div>
        <div class="mb-3">
            <input type="number" id="sl_sem" class="form-control" name="sl_sem" placeholder="Skill Lab Semester" required>
        </div>
        <div class="mb-3">
            <input type="text" id="dept_id" class="form-control" name="dept_id" placeholder="Department ID" required>
        </div>
        <!-- <div class="mb-3">
            <input type="text" id="person_id" class="form-control" name="person_id" placeholder="Person ID" required>
        </div>
        <div class="mb-3">
            <input type="text" id="c_id" class="form-control" name="c_id" placeholder="C_ID" required>
        </div> -->
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>