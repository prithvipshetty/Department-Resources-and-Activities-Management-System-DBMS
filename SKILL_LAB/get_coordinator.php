<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
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

                        // Query to fetch data from the coordinator table based on c_id
                        $sql = "SELECT * FROM coordinator WHERE c_id = '$c_id'";
                        $result = mysqli_query($con, $sql);

                        // Check if the query was successful
                        if ($result) {
                            // Start the table
                            echo '<table class="table table-bordered">';
                            // Display table headers
                            echo '<thead class="bg-dark text-white">';
                            echo '<tr>';
                            echo '<th>Name</th>';
                            echo '<th>Department</th>';
                            echo '<th>Contact</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            // Fetch the data and display it in a tabular format
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['c_name'] . '</td>';
                                echo '<td>' . $row['c_dept'] . '</td>';
                                echo '<td>' . $row['c_contact'] . '</td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            // Close the table
                            echo '</table>';
                        } else {
                            echo "Error fetching coordinator details: " . mysqli_error($con);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
