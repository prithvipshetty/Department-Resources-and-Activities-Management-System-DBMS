<?php
include 'connect.php';

if(isset($_GET['deleteid'])){
    $w_id = $_GET['deleteid'];
    
    // Delete enrollments associated with the workshop
    $delete_enrollments_sql = "DELETE FROM workshop_enroll WHERE w_id='$w_id'";
    $result_enrollments = mysqli_query($con, $delete_enrollments_sql);
    
    if (!$result_enrollments) {
        die("Error deleting enrollments: " . mysqli_error($con));
    }
    
    // Now delete the workshop itself
    $delete_workshop_sql = "DELETE FROM `workshop` WHERE w_id='$w_id'";
    $result_workshop = mysqli_query($con, $delete_workshop_sql);

    if ($result_workshop) {
       header('location:index.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
