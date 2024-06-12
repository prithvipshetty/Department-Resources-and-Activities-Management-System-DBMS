<?php
include 'connect.php';

$id = isset($_GET['updateid']) ? $_GET['updateid'] : null;
$sql = "SELECT * FROM `resource_person` WHERE person_id='$id'";
$result = mysqli_query($con, $sql);

$p_name = '';
$p_contact = '';
$title_of_position = '';
$p_expertise = '';

if (!$result) {
    die("Error: " . mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $p_name = $row['p_name'];
    $p_contact = $row['p_contact'];
    $title_of_position = $row['title_of_position'];
    $p_expertise = $row['p_expertise'];
} else {
    echo "No resource_person found with the provided ID.";
}

if (isset($_POST['update'])) {
    $p_name = $_POST['p_name'];
    $p_contact = $_POST['p_contact'];
    $title_of_position = $_POST['title_of_position'];
    $p_expertise = $_POST['p_expertise'];

    $sql = "UPDATE `resource_person` SET p_name='$p_name', p_contact='$p_contact', title_of_position='$title_of_position', p_expertise='$p_expertise' WHERE person_id='$id'";
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
    <title>RESOURCE PERSON</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark">
<h2 class="text-center mt-4">UPDATE</h2>

<div class="container">
    <form method="post" class="mx-auto mt-4 p-4 border border-primary rounded bg-white">
        <div class="mb-3">
            <input type="text" id="p_name" name="p_name" placeholder="Resource person name" required class="form-control" value="<?php echo $p_name; ?>">
        </div>
        <div class="mb-3">
            <input type="text" id="p_contact" name="p_contact" placeholder="Contact info" required class="form-control" value="<?php echo $p_contact; ?>">
        </div>
        <div class="mb-3">
            <input type="text" id="title_of_position" name="title_of_position" placeholder="Title of position" required class="form-control" value="<?php echo $title_of_position; ?>">
        </div>
        <div class="mb-3">
            <input type="text" id="p_expertise" name="p_expertise" placeholder="Expertise" required class="form-control" value="<?php echo $p_expertise; ?>">
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
