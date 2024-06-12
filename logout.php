<?php
session_start();
include 'connect.php';

// Check if the session variable 'usn' is set
if (isset($_SESSION['usn'])) {
    // Delete all entries from the 'login' table
    $delete_query = "DELETE FROM login";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        // Unset and destroy the session
        session_unset();
        session_destroy();

        // Redirect to the login page
        header("Location: login.php");
        exit();
    } else {
        echo "Error deleting entries from login table: " . mysqli_error($con);
    }
} else {
    // If 'usn' session variable is not set, redirect to the login page
    header("Location: login.php");
    exit();
}
?>