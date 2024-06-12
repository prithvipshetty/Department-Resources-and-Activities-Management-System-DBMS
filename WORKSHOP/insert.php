<?php
include 'connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve workshop details from the form
    $w_id = $_POST['w_id'];
    $w_topic = $_POST['w_topic'];
    $w_location = $_POST['w_location'];
    $w_time = $_POST['w_time'];
    $w_date = $_POST['w_date'];
    $w_duration = $_POST['w_duration'];
    $person_id = $_POST['person_id'];
    $c_id = $_POST['c_id']; // Single Coordinator ID
    
    // Insert workshop details into the workshop table
    $sql_workshop = "INSERT INTO workshop (w_id, w_topic, w_location, w_time, w_date, w_duration, person_id, c_id) 
                    VALUES ('$w_id', '$w_topic', '$w_location', '$w_time', '$w_date', '$w_duration', '$person_id', '$c_id')";

    if (mysqli_query($con, $sql_workshop)) {
        // Retrieve enrollments and USNs from the form
        $enrollments = $_POST['enrollments'];
        $usns = $_POST['usn'];

        // Insert enrollments into the workshop_enroll table
        foreach ($usns as $usn) {
            $sql_enroll = "INSERT INTO workshop_enroll (USN, w_id) VALUES ('$usn', '$w_id')";
            mysqli_query($con, $sql_enroll);
        }

        // Redirect to index.php or any other page after successful insertion
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql_workshop . "<br>" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Insert Workshop</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center"><strong>Insert Workshop</strong></h2>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="w_id" class="form-label">Workshop ID</label>
                                <input type="text" class="form-control" id="w_id" name="w_id" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="w_topic" name="w_topic" placeholder="Workshop Topic" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="w_location" name="w_location" placeholder="Workshop Location" required>
                            </div>
                            <div class="mb-3">
                                <input type="time" class="form-control" id="w_time" name="w_time" placeholder="Workshop Time" required>
                            </div>
                            <div class="mb-3">
                                <input type="date" class="form-control" id="w_date" name="w_date" placeholder="Workshop Date" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" id="w_duration" name="w_duration" placeholder="Workshop Duration" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="person_id" name="person_id" placeholder="Resource Person ID" required>
                            </div>
                            <div class="mb-3">
                                <label for="c_id" class="form-label">Coordinator ID</label>
                                <input type="text" class="form-control" id="c_id" name="c_id" placeholder="Coordinator ID" required>
                            </div>
                            <div class="mb-3">
                                <label for="enrollments" class="form-label">Number of Enrollments</label>
                                <input type="number" class="form-control" id="enrollments" name="enrollments" required>
                            </div>
                            <!-- USN input fields -->
                            <div id="usnFields"></div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a href="index.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Dynamically generate input fields for USNs based on the number of enrollments
        document.getElementById('enrollments').addEventListener('change', function() {
            var enrollments = parseInt(this.value);
            var usnFields = document.getElementById('usnFields');
            usnFields.innerHTML = '';

            for (var i = 1; i <= enrollments; i++) {
                var div = document.createElement('div');
                div.classList.add('mb-3');

                var label = document.createElement('label');
                label.setAttribute('for', 'usn' + i);
                label.classList.add('form-label');
                label.innerText = 'USN ' + i;

                var input = document.createElement('input');
                input.setAttribute('type', 'text');
                input.classList.add('form-control');
                input.setAttribute('id', 'usn' + i);
                input.setAttribute('name', 'usn[]');

                div.appendChild(label);
                div.appendChild(input);
                usnFields.appendChild(div);
            }
        });
    </script>
</body>
</html>
