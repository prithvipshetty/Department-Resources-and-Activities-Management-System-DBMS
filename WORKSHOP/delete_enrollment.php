<?php
include 'connect.php';

// Check if the action is specified and it is to delete an enrollment
if ($_POST['action'] === 'deleteEnrollment') {
    $w_id = $_POST['w_id'];
    $usn = $_POST['usn'];

    // Delete the enrollment from the database
    $delete_sql = "DELETE FROM workshop_enroll WHERE w_id='$w_id' AND USN='$usn'";
    $result = mysqli_query($con, $delete_sql);

    if ($result) {
        echo "Enrollment deleted successfully.";
    } else {
        echo "Error deleting enrollment: " . mysqli_error($con);
    }
}
?>
