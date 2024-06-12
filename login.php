<?php
session_start();
include 'connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role']; // Role can be 'faculty' or 'student'

    if ($role == 'faculty') {
        $phone_number = $_POST['phone_number'];

        // Validate faculty login
        $sql = "SELECT * FROM coordinator WHERE c_contact = '$phone_number'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 1) {
            // Faculty login successful
            $_SESSION['role'] = 'faculty';
            header("Location: frontpage.php"); // Redirect to frontpage.php
            exit();
        } else {
            // Faculty login failed
            $error = "Invalid phone number";
        }
    } elseif ($role == 'student') {
        $usn = $_POST['usn'];

        // Validate student login
        $sql = "SELECT * FROM student WHERE USN = '$usn'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 1) {
            // Student login successful
            $_SESSION['role'] = 'student';
            $_SESSION['usn'] = $usn; // Set the session variable

            // Insert the USN into the login table
            $insert_sql = "INSERT INTO login (USN) VALUES ('$usn')";
            mysqli_query($con, $insert_sql);

            header("Location: studentfront.php");
            exit();
        } else {
            // Student login failed
            $error = "Invalid USN";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('background.png');
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .container {
    background-color: WHITE;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    text-align: left; /* Align text to the left */
    width: 500px; /* Adjust width as needed */
    height: 400px; /* Adjust height as needed */
}

h2 {
    margin-bottom: 10px; /* Decreased margin */
    text-align: center;
    font-size: 20px; /* Decreased font size */
}

        .form-group {
            margin-bottom: 50px; /* Further decreased margin */
        }
        label {
            font-weight: bold;
            font-size: 20px; /* Decreased font size */
        }
        input[type="text"],
        select {
            width: 50%;
            padding: 4px; /* Further decreased padding */
            font-size: 20px; /* Decreased font size */
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button[type="submit"] {
            width: 10%;
            padding: 6px; /* Further decreased padding */
            font-size: 14px; /* Decreased font size */
        }
        .error {
            color: red;
            font-size: 15px; /* Decreased font size */
            margin-top: 5px; /* Further decreased margin */
        }
        .custom-dropdown {
            width: 50%;
            padding: 4px /* Adjust the width as needed */
            height: 40px; /* Increased height */
            font-size: 20px; /* Decreased font size */
        }

        /* Custom styles for dropdown menu */
        .custom-dropdown-menu {
            font-size: 20px; /* Decreased font size */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
            <label for="role">Role:</label>
                <select class="form-control form-control-sm custom-dropdown" name="role" id="role">
                    <option value="faculty">Faculty</option>
                    <option value="student">Student</option>
                </select>
            </div>
            <div class="form-group" id="phone-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control form-control-sm" id="phone_number" name="phone_number"> <!-- Decreased input size -->
            </div>
            <div class="form-group" id="usn-group" style="display: none;">
                <label for="usn">USN:</label>
                <input type="text" class="form-control form-control-sm" id="usn" name="usn"> <!-- Decreased input size -->
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Login</button> <!-- Decreased button size -->
            </div>
            <?php
            if (isset($error)) {
                echo '<div class="error">' . $error . '</div>';
            }
            ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Show/hide input fields based on selected role
        document.getElementById('role').addEventListener('change', function() {
            var role = this.value;
            var phoneGroup = document.getElementById('phone-group');
            var usnGroup = document.getElementById('usn-group');

            if (role === 'faculty') {
                phoneGroup.style.display = 'block';
                usnGroup.style.display = 'none';
            } else if (role === 'student') {
                phoneGroup.style.display = 'none';
                usnGroup.style.display = 'block';
            }
        });
    </script>
</body>
</html>
