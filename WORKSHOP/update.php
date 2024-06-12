<?php
include 'connect.php';

$id = isset($_GET['updateid']) ? $_GET['updateid'] : null;

// Function to fetch workshop details and enrollments
function fetchWorkshopDetails($con, $id) {
    $details = array();
    $sql = "SELECT * FROM `workshop` WHERE w_id='$id'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Error: " . mysqli_error($con));
    }
    if (mysqli_num_rows($result) > 0) {
        $details['workshop'] = mysqli_fetch_assoc($result);

        // Fetch enrollments for the workshop
        $sql_enrollments = "SELECT * FROM workshop_enroll WHERE w_id='$id'";
        $result_enrollments = mysqli_query($con, $sql_enrollments);
        if ($result_enrollments) {
            $enrollments = array();
            while ($row_enrollment = mysqli_fetch_assoc($result_enrollments)) {
                $enrollments[] = $row_enrollment['USN']; // Add each enrollment to the array
            }
            $details['enrollments'] = $enrollments;
        }
    } else {
        echo "No workshop found with the provided ID.";
    }
    return $details;
}

// Fetch workshop details and enrollments
$workshopDetails = fetchWorkshopDetails($con, $id);
$workshop = $workshopDetails['workshop'];
$enrollments = isset($workshopDetails['enrollments']) ? $workshopDetails['enrollments'] : array();

if (isset($_POST['update'])) {
    // Retrieve updated workshop details from the form
    $w_topic = $_POST['w_topic'];
    $w_location = $_POST['w_location'];
    $w_time = $_POST['w_time'];
    $w_date = $_POST['w_date'];
    $w_duration = $_POST['w_duration'];
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

    // Update workshop details in the database
    $sql = "UPDATE `workshop` SET w_topic='$w_topic', w_location='$w_location', w_time='$w_time', w_date='$w_date', w_duration='$w_duration', dept_id='$dept_id', person_id='$person_id', c_id='$c_id' WHERE w_id='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Update enrollments in the workshop_enroll table
        // First, delete existing enrollments for this workshop
        $delete_sql = "DELETE FROM workshop_enroll WHERE w_id='$id'";
        mysqli_query($con, $delete_sql);

        // Then, insert the updated enrollments
        foreach ($enrollments as $usn) {
            $insert_sql = "INSERT INTO workshop_enroll (w_id, USN) VALUES ('$id', '$usn')";
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
       
    <div class="card-header">
                        <h2 class="display-6 text-center"><strong>Update Workshop</strong></h2>
                    </div><!-- Workshop details inputs -->
        <div class="mb-3">
            <label for="w_topic" class="form-label">Workshop Topic</label>
            <input type="text" class="form-control" id="w_topic" name="w_topic" value="<?php echo $workshop['w_topic']; ?>">
        </div>
    
        <div class="mb-3">
            <label for="w_location" class="form-label">Workshop Location</label>
            <input type="text" class="form-control" id="w_location" name="w_location" value="<?php echo $workshop['w_location']; ?>">
        </div>
        <div class="mb-3">
            <label for="w_time" class="form-label">Workshop Time</label>
            <input type="text" class="form-control" id="w_time" name="w_time" value="<?php echo $workshop['w_time']; ?>">
        </div>
        <div class="mb-3">
            <label for="w_date" class="form-label">Workshop Date</label>
            <input type="text" class="form-control" id="w_date" name="w_date" value="<?php echo $workshop['w_date']; ?>">
        </div>
        <div class="mb-3">
            <label for="w_duration" class="form-label">Workshop Duration</label>
            <input type="text" class="form-control" id="w_duration" name="w_duration" value="<?php echo $workshop['w_duration']; ?>">
        </div>
        <div class="mb-3">
            <label for="dept_id" class="form-label">Department ID</label>
            <input type="text" class="form-control" id="dept_id" name="dept_id" value="<?php echo $workshop['dept_id']; ?>">
        </div>
        <div class="mb-3">
            <label for="person_id" class="form-label">Person ID</label>
            <input type="text" class="form-control" id="person_id" name="person_id" value="<?php echo $workshop['person_id']; ?>">
        </div>
        <div class="mb-3">
            <label for="c_id" class="form-label">Coordinator ID</label>
            <input type="text" class="form-control" id="c_id" name="c_id" value="<?php echo $workshop['c_id']; ?>">
        </div>

      <!-- Enrollments input -->
      <div class="mb-3">
            <label for="enrollments" class="form-label">Enrollments</label>
            <input type="number" class="form-control" id="enrollments" name="enrollments" value="<?php echo count($enrollments); ?>">
            <div id="usnFields">
                <?php
                // Display previously inserted USNs
                foreach ($enrollments as $index => $usn) {
                    echo '<div class="mb-3">';
                    echo '<label for="usn' . ($index + 1) . '" class="form-label">USN ' . ($index + 1) . '</label>';
                    echo '<input type="text" class="form-control" id="usn' . ($index + 1) . '" name="usn[]" value="' . $usn . '">';
                    echo '</div>';
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
        var deletedUSNs = [];

        while (currentCount > newCount) {
            var lastDiv = usnFields.lastElementChild;
            var lastUSN = lastDiv.querySelector('input').value;
            deletedUSNs.push(lastUSN); // Store deleted USNs

            // Remove the last input field
            usnFields.removeChild(lastDiv);
            currentCount--;
        }

        // Prompt the user to enter the USN to be deleted
        var usnToDelete = prompt('Enter the USN to be deleted:', deletedUSNs[deletedUSNs.length - 1]);

        // Update the corresponding W_ID in the backend
        if (usnToDelete) {
            var formData = new FormData();
            formData.append('action', 'deleteLastEnrollment');
            formData.append('w_id', '<?php echo $id; ?>');
            formData.append('usn', usnToDelete);

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
