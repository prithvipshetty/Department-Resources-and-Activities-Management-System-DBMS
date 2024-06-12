<?php
include 'connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve seminar_webiner details from the form
    $ws_id = $_POST['ws_id'];
    $ws_title = $_POST['ws_title'];
    $ws_location = $_POST['ws_location'];
    $ws_time = $_POST['ws_time'];
    $ws_date = $_POST['ws_date'];
    $mode = $_POST['mode'];
    $dept_id = $_POST['dept_id'];
    $person_id = $_POST['person_id'];
    $c_id = $_POST['c_id']; // Only one coordinator ID

    // Insert seminar_webiner details into the seminar_webiner table
    $sql_seminar_webiner = "INSERT INTO seminar_webiner (ws_id, ws_title, ws_location, ws_time, ws_date, mode, dept_id, person_id, c_id) 
                    VALUES ('$ws_id', '$ws_title', '$ws_location', '$ws_time', '$ws_date', '$mode', '$dept_id', '$person_id', '$c_id')";

    if (mysqli_query($con, $sql_seminar_webiner)) {
        // Retrieve enrollments and USNs from the form
        $enrollments = isset($_POST['enrollments']) ? $_POST['enrollments'] : 0;
        $usns = isset($_POST['usn']) ? $_POST['usn'] : array();

        // Insert enrollments into the ws_enroll table
        foreach ($usns as $usn) {
            // Check if the USN exists in the student table
            $check_usn_query = "SELECT * FROM student WHERE USN = '$usn'";
            $result = mysqli_query($con, $check_usn_query);
            if (mysqli_num_rows($result) > 0) {
                $sql_enroll = "INSERT INTO ws_enroll (USN, ws_id) VALUES ('$usn', '$ws_id')";
                mysqli_query($con, $sql_enroll);
            } else {
                echo "Error: USN $usn does not exist in the student table.<br>";
            }
        }

        // Redirect to index.php or any other page after successful insertion
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql_seminar_webiner . "<br>" . mysqli_error($con);
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
    <title>Insert seminar_webiner</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center"><strong>Insert seminar_webiner</strong></h2>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="ws_id" class="form-label">seminar_webiner ID</label>
                                <input type="text" class="form-control" id="ws_id" name="ws_id" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="ws_title" name="ws_title" placeholder="seminar_webiner Topic" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="ws_location" name="ws_location" placeholder="seminar_webiner Location" required>
                            </div>
                            <div class="mb-3">
                                <input type="time" class="form-control" id="ws_time" name="ws_time" placeholder="seminar_webiner Time" required>
                            </div>
                            <div class="mb-3">
                                <input type="date" class="form-control" id="ws_date" name="ws_date" placeholder="seminar_webiner Date" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="mode" name="mode" placeholder="mode" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="dept_id" name="dept_id" placeholder="DEPARTMENT ID" required>
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
