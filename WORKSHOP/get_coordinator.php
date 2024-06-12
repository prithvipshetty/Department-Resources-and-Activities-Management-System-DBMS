<?php
include 'connect.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Coordinator Details</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center"><strong>Coordinator Details</strong></h2>
                    </div>
                    <div class="card-body">
                        <?php
                        // Retrieve c_id from the URL
                        $c_id = $_GET['c_id'];

                        // Query to fetch data from the coordinator and workshop tables based on c_id
                        $sql_workshop = "SELECT coordinator.*, workshop.* FROM coordinator 
                                LEFT JOIN workshop ON coordinator.c_id = workshop.c_id
                                WHERE coordinator.c_id = '$c_id'";
                        $result_workshop = mysqli_query($con, $sql_workshop);

                        // Query to fetch data from the coordinator and seminar_webiner tables based on c_id
                        $sql_seminar = "SELECT coordinator.*, seminar_webiner.* FROM coordinator 
                                LEFT JOIN seminar_webiner ON coordinator.c_id = seminar_webiner.c_id
                                WHERE coordinator.c_id = '$c_id'";
                        $result_seminar = mysqli_query($con, $sql_seminar);

                        // Check if the queries were successful
                        if ($result_workshop && $result_seminar) {
                            // Start the table
                            echo '<table class="table table-bordered">';
                            // Display table headers
                            echo '<thead class="bg-dark text-white">';
                            echo '<tr>';
                            echo '<th>Coordinator Name</th>';
                            echo '<th>Department</th>';
                            echo '<th>Contact</th>';
                            echo '<th>Event Name</th>';
                            echo '<th>Event Type</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            // Fetch and display data from the workshop table
                            while ($row = mysqli_fetch_assoc($result_workshop)) {
                                echo '<tr>';
                                echo '<td>' . $row['c_name'] . '</td>';
                                echo '<td>' . $row['c_dept'] . '</td>';
                                echo '<td>' . $row['c_contact'] . '</td>';
                                echo '<td>' . $row['w_topic'] . '</td>';
                                echo '<td>Workshop</td>'; // Event type for workshop
                                echo '</tr>';
                            }

                            // Fetch and display data from the seminar_webiner table
                            while ($row = mysqli_fetch_assoc($result_seminar)) {
                                echo '<tr>';
                                echo '<td>' . $row['c_name'] . '</td>';
                                echo '<td>' . $row['c_dept'] . '</td>';
                                echo '<td>' . $row['c_contact'] . '</td>';
                                echo '<td>' . $row['ws_title'] . '</td>';
                                echo '<td>' . $row['mode'] . '</td>';
                                echo '</tr>';
                            }

                            echo '</tbody>';
                            // Close the table
                            echo '</table>';
                        } else {
                            echo "Error fetching coordinator details: " . mysqli_error($con);
                        }
                        ?>
                        <a href="index.php" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
