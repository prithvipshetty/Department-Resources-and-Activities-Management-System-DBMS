<?php
include 'connect.php';
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Enrollment Details</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center"><strong>Enrollment Details</strong></h2>
                    </div>
                    <div class="card-body">
                        <?php
                        // Retrieve workshop ID from the URL
                        $ws_id = $_GET['ws_id'];

                        // Query to fetch data from the workshop_enroll and student tables based on w_id
                        $sql = "SELECT s.* FROM ws_enroll we
                                LEFT JOIN student s ON we.USN = s.USN
                                WHERE we.ws_id = '$ws_id'";
                        $result = mysqli_query($con, $sql);

                        // Check if the query was successful
                        if ($result) {
                            // Start the table
                            echo '<table class="table table-bordered">';
                            // Display table headers
                            echo '<thead class="bg-dark text-white">';
                            echo '<tr>';
                            echo '<th>USN</th>';
                            echo '<th>Name</th>';
                            echo '<th>Semester</th>';
                            echo '<th>Department</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            // Fetch the data and display it in a tabular format
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['USN'] . '</td>';
                                echo '<td>' . $row['s_name'] . '</td>';
                                echo '<td>' . $row['s_sem'] . '</td>';
                                echo '<td>' . $row['s_dept'] . '</td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            // Close the table
                            echo '</table>';
                        } else {
                            echo "Error fetching enrollment details: " . mysqli_error($con);
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
</html>
