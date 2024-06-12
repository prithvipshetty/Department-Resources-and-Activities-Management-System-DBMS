<?php
include 'connect.php';

$id = isset($_GET['updateid']) ? $_GET['updateid'] : null;
$sql = "SELECT * FROM `coordinator` WHERE c_id='$id'";
$result = mysqli_query($con, $sql);

$c_name = '';
$c_dept = '';
$c_contact = '';

if (!$result) {
    die("Error: " . mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $c_name = $row['c_name'];
    $c_dept = $row['c_dept'];
    $c_contact = $row['c_contact'];
} else {
    echo "No faculty found with the provided ID.";
}

if (isset($_POST['update'])) {
    $c_name = $_POST['c_name'];
    $c_dept = $_POST['c_dept'];
    $c_contact = $_POST['c_contact'];
    $sql = "UPDATE `coordinator` SET c_name='$c_name', c_dept='$c_dept', c_contact='$c_contact' WHERE c_id='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('Location: index.php'); // Redirect to index.php after successful update
        exit();
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark">

<h2 class="text-center mt-4">UPDATE</h2>

<div class="container">
    <form method="post" class="mx-auto mt-4 p-4 border border-primary rounded bg-white">
        <div class="mb-3">
            <input type="text" id="c_name" name="c_name" placeholder="Faculty name" required class="form-control" value="<?php echo $c_name; ?>">
        </div>
        <div class="mb-3">
            <input type="text" id="c_dept" name="c_dept" placeholder="Faculty department" required class="form-control" value="<?php echo $c_dept; ?>">
        </div>
        <div class="mb-3">
            <input type="Phonenumber" id="c_contact" name="c_contact" placeholder="Faculty contact" required class="form-control" value="<?php echo $c_contact; ?>">
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
