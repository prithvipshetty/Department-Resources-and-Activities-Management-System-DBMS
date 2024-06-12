<?php
session_start();
include 'connect.php';

// Check if the session variable 'usn' is set
if (isset($_SESSION['usn'])) {
    $usn = $_SESSION['usn'];

    // Fetch student information from the 'student' table
    $student_query = "SELECT * FROM student WHERE USN = '$usn'";
    $student_result = mysqli_query($con, $student_query);
    $student_row = mysqli_fetch_assoc($student_result);

    // Fetch workshop details enrolled by the student
    $workshop_query = "SELECT workshop.w_topic, workshop.w_location, workshop.w_time, workshop.w_date
                       FROM workshop
                       INNER JOIN workshop_enroll ON workshop.w_id = workshop_enroll.w_id
                       WHERE workshop_enroll.USN = '$usn'";
    $workshop_result = mysqli_query($con, $workshop_query);

    // Fetch seminar/webinar details enrolled by the student
    $seminar_query = "SELECT seminar_webiner.ws_title, seminar_webiner.ws_location, seminar_webiner.ws_time, seminar_webiner.ws_date
                     FROM seminar_webiner
                     INNER JOIN ws_enroll ON seminar_webiner.ws_id = ws_enroll.ws_id
                     WHERE ws_enroll.USN = '$usn'";
    $seminar_result = mysqli_query($con, $seminar_query);
} else {
    // Redirect to login page if 'usn' is not set
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: white;
            padding-top: 20px; /* Adjust top padding as needed */
        }
        .container {
            background-color: black;
            padding: 20px; /* Adjust padding as needed */
            border-radius: 10px; /* Add rounded corners */
        }
        .table {
            background-color: black;
            color: white;
            border-collapse: collapse; /* Collapse border spacing */
        }
        .table th,
        .table td {
            border: 1px solid white; /* Add white border */
            padding: 8px; /* Add padding to table cells */
        }
        .table th {
            background-color: #343a40; /* Dark background for table headers */
        }
        .table td {
            background-color: #495057; /* Dark background for table data cells */
        }
        .btn {
            background-color: #dc3545; /* Button color */
            border-color: #dc3545; /* Button border color */
        }
        .btn:hover {
            background-color: #c82333; /* Button hover color */
            border-color: #bd2130; /* Button hover border color */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $student_row['s_name']; ?></h2>
        <h3>Student Information</h3>
        <p><strong>USN:</strong> <?php echo $student_row['USN']; ?></p>
        <p><strong>Semester:</strong> <?php echo $student_row['s_sem']; ?></p>
        <p><strong>Department:</strong> <?php echo $student_row['s_dept']; ?></p>
        

        <h3>Workshops Attended</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Topic</th>
                    <th>Location</th>
                    <th>Time</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($workshop_result)) {
                    echo "<tr>";
                    echo "<td>".$row['w_topic']."</td>";
                    echo "<td>".$row['w_location']."</td>";
                    echo "<td>".$row['w_time']."</td>";
                    echo "<td>".$row['w_date']."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h3>Seminars Attended</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Time</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($seminar_result)) {
                    echo "<tr>";
                    echo "<td>".$row['ws_title']."</td>";
                    echo "<td>".$row['ws_location']."</td>";
                    echo "<td>".$row['ws_time']."</td>";
                    echo "<td>".$row['ws_date']."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <Button class="btn btn-danger"><a href="logout.php?deleteid=<?php echo $usn; ?>" class="text-light">LOGOUT</a></Button>
    </div>

    <!-- Bootstrap JS (optional) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>