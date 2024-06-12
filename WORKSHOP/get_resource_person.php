<?php
include 'connect.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resource Person Details</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center"><strong>Resource Person Details</strong></h2>
                    </div>
                    <div class="card-body">
                        <?php
                        // Retrieve person_id from the URL
                        $person_id = $_GET['person_id'];

                        // Query to fetch data from the resource_person table based on person_id
                        $sql = "SELECT * FROM resource_person WHERE person_id = '$person_id'";
                        $result = mysqli_query($con, $sql);

                        // Check if the query was successful
                        if ($result) {
                            // Start the table
                            echo '<table class="table table-bordered">';
                            // Display table headers
                            echo '<thead class="bg-dark text-white">';
                            echo '<tr>';
                            echo '<th>Name</th>';
                            echo '<th>Contact</th>';
                            echo '<th>Title of Position</th>';
                            echo '<th>Expertise</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            // Fetch the data and display it in a tabular format
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['p_name'] . '</td>';
                                echo '<td>' . $row['p_contact'] . '</td>';
                                echo '<td>' . $row['title_of_position'] . '</td>';
                                echo '<td>' . $row['p_expertise'] . '</td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            // Close the table
                            echo '</table>';
                        } else {
                            echo "Error fetching resource person details: " . mysqli_error($con);
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

