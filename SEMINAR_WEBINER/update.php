<?php
include 'connect.php';

$id = isset($_GET['updateid']) ? $_GET['updateid'] : null;

// Function to fetch seminar_webiner details and enrollments
function fetchseminar_webinerDetails($con, $id) {
    $details = array();
    $sql = "SELECT * FROM `seminar_webiner` WHERE ws_id='$id'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Error: " . mysqli_error($con));
    }
    if (mysqli_num_rows($result) > 0) {
        $details['seminar_webiner'] = mysqli_fetch_assoc($result);

        // Fetch enrollments for the seminar_webiner
        $sql_enrollments = "SELECT * FROM ws_enroll WHERE ws_id='$id'";
        $result_enrollments = mysqli_query($con, $sql_enrollments);
        if ($result_enrollments) {
            $enrollments = array();
            while ($row_enrollment = mysqli_fetch_assoc($result_enrollments)) {
                $enrollments[] = $row_enrollment['USN']; // Add each enrollment to the array
            }
            $details['enrollments'] = $enrollments;
        }
    } else {
        echo "No seminar_webiner found with the provided ID.";
    }
    return $details;
}

// Fetch seminar_webiner details and enrollments
$seminar_webinerDetails = fetchseminar_webinerDetails($con, $id);
$seminar_webiner = isset($seminar_webinerDetails['seminar_webiner']) ? $seminar_webinerDetails['seminar_webiner'] : array();
$enrollments = isset($seminar_webinerDetails['enrollments']) ? $seminar_webinerDetails['enrollments'] : array();

if (isset($_POST['update'])) {
    // Retrieve updated seminar_webiner details from the form
    $ws_title = $_POST['ws_title'];
    $ws_location = $_POST['ws_location'];
    $ws_time = $_POST['ws_time'];
    $ws_date = $_POST['ws_date'];
    $mode = $_POST['mode'];
    $dept_id = $_POST['dept_id'];
    $person_id = $_POST['person_id'];
    $c_id = $_POST['c_id'];
    $enrollments = isset($_POST['usn']) ? $_POST['usn'] : array(); // Updated enrollments from the form

    // Check if the person_id exists in the resource_person table before updating
    $person_check_sql = "SELECT * FROM resource_person WHERE person_id='$person_id'";
    $person_check_result = mysqli_query($con, $person_check_sql);
    if (mysqli_num_rows($person_check_result) == 0) {
        die("Error: Person with ID $person_id does not exist.");
    }

    // Update seminar_webiner details in the database
    $sql = "UPDATE `seminar_webiner` SET ws_title='$ws_title', ws_location='$ws_location', ws_time='$ws_time', ws_date='$ws_date', mode='$mode', dept_id='$dept_id', person_id='$person_id', c_id='$c_id' WHERE ws_id='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Update enrollments in the ws_enroll table
        // First, delete existing enrollments for this seminar_webiner
        $delete_sql = "DELETE FROM ws_enroll WHERE ws_id='$id'";
        mysqli_query($con, $delete_sql);

        // Then, insert the updated enrollments
        foreach ($enrollments as $usn) {
            $insert_sql = "INSERT INTO ws_enroll (ws_id, USN) VALUES ('$id', '$usn')";
            mysqli_query($con, $insert_sql);
        }

        // Redirect to the index page after successful update
        header("Location: index.php");
        exit(); // Ensure no further code execution after the redirect
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark">

<h2 class="text-center mt-4">UPDATE</h2>

<div class="container">
    <form method="post" class="mx-auto mt-4 p-4 border border-primary rounded bg-white">
        <!-- seminar_webiner details inputs -->
        <div class="mb-3">
            <label for="ws_title" class="form-label">seminar_webiner Title</label>
            <input type="text" class="form-control" id="ws_title" name="ws_title"  value="<?php echo $seminar_webiner['ws_title']; ?>">
        </div>
    
        <div class="mb-3">
            <label for="ws_location" class="form-label">Location</label>
            <input type="text" class="form-control" id="ws_location" name="ws_location" value="<?php echo $seminar_webiner['ws_location']; ?>">
        </div>
        <div class="mb-3">
            <label for="ws_time" class="form-label">Time</label>
            <input type="text" class="form-control" id="ws_time" name="ws_time" value="<?php echo $seminar_webiner['ws_time']; ?>">
        </div>
        <div class="mb-3">
            <label for="ws_date" class="form-label">Date</label>
            <input type="text" class="form-control" id="ws_date" name="ws_date" value="<?php echo $seminar_webiner['ws_date']; ?>">
        </div>
        <div class="mb-3">
            <label for="mode" class="form-label">Duration</label>
            <input type="text" class="form-control" id="mode" name="mode" value="<?php echo $seminar_webiner['mode']; ?>">
        </div>
        <div class="mb-3">
            <label for="dept_id" class="form-label">Department ID</label>
            <input type="text" class="form-control" id="dept_id" name="dept_id" value="<?php echo $seminar_webiner['dept_id']; ?>">
        </div>
        <div class="mb-3">
            <label for="person_id" class="form-label">Person ID</label>
            <input type="text" class="form-control" id="person_id" name="person_id" value="<?php echo $seminar_webiner['person_id']; ?>">
        </div>
        <div class="mb-3">
            <label for="c_id" class="form-label">Coordinator ID</label>
            <input type="text" class="form-control" id="c_id" name="c_id" value="<?php echo $seminar_webiner['c_id']; ?>">
        </div>

      <!-- Enrollments input -->
      <div class="mb-3">
            <label for="enrollments" class="form-label">Enrollments</label>
            <input type="number" class="form-control" id="enrollments" name="enrollments" value="<?php echo count($enrollments); ?>">
            <div id="usnFields">
            <?php
                // Display previously inserted USNs
                if(!empty($enrollments)) {
                    foreach ($enrollments as $index => $usn) {
                        echo '<div class="mb-3">';
                        echo '<label for="usn' . ($index + 1) . '" class="form-label">USN ' . ($index + 1) . '</label>';
                        echo '<input type="text" class="form-control" id="usn' . ($index + 1) . '" name="usn[]" value="' . $usn . '">';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>

        <!-- Update and Cancel buttons -->
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script>
    // Function to dynamically add input fields for USNs
    function addUSNFields(currentCount, newCount) {
        var usnFields = document.getElementById('usnFields');

        for (var i = currentCount + 1; i <= newCount; i++) {
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
    }

    // Function to dynamically remove excess input fields for USNs
    function removeExcessUSNFields(currentCount, newCount) {
        var usnFields = document.getElementById('usnFields');
        while (currentCount > newCount) {
            var lastDiv = usnFields.lastElementChild;
            var lastUSN = lastDiv.querySelector('input').value;

            // Delete the last USN and its corresponding ws_id in the backend
            var formData = new FormData();
            formData.append('action', 'deleteLastEnrollment');
            formData.append('ws_id', '<?php echo $id; ?>');
            formData.append('usn', lastUSN);

            fetch('delete_last_enrollment.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(result => {
                console.log(result);
            })
            .catch(error => {
                console.error('Error:', error);
            });

            // Remove the last input field
            usnFields.removeChild(lastDiv);
            currentCount--;
        }
    }

    // Dynamically generate input fields for USNs based on the number of enrollments
    document.getElementById('enrollments').addEventListener('change', function () {
        var currentCount = document.querySelectorAll('#usnFields > div').length;
        var newCount = parseInt(this.value);

        if (newCount > currentCount) {
            addUSNFields(currentCount, newCount);
        } else if (newCount < currentCount) {
            removeExcessUSNFields(currentCount, newCount);
        }
    });
</script>
</body>
</html>
