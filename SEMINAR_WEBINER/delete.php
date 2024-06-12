<?php
include 'connect.php';

if(isset($_GET['deleteid'])) {
    $ws_id = $_GET['deleteid'];
    
    // Delete dependent records from ws_enroll table
    $sql_delete_enroll = "DELETE FROM ws_enroll WHERE ws_id = '$ws_id'";
    $result_delete_enroll = mysqli_query($con, $sql_delete_enroll);

    if (!$result_delete_enroll) {
        die("Error deleting enrollments: " . mysqli_error($con));
    }

    // Now delete the record from seminar_webiner table
    $sql_delete_seminar_webiner = "DELETE FROM seminar_webiner WHERE ws_id = '$ws_id'";
    $result_delete_seminar_webiner = mysqli_query($con, $sql_delete_seminar_webiner);

    if ($result_delete_seminar_webiner) {
        header('location: index.php');
    } else {
        die("Error deleting record: " . mysqli_error($con));
    }
}
?>
