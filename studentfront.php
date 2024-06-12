<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('background.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .navbar {
            background-color: white; /* Change navbar color to white */
        }
        .navbar-brand {
            color: black; /* Change navbar text color to black */
            font-size: 2.5rem; /* Adjust the font size as needed */
        }
        .display-2 {
            font-size: 3rem; /* Decrease the font size of the heading */
        }
        .card {
            opacity: 0.8; /* Lighten the opacity of the card */
        }
    </style>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="Logo" width="80" height="70" class="d-inline-block align-text-top">
                <span style="color: black;">Dashboard</span> <!-- Change text color to black -->
            </a>
        </div>
    </nav>
    <div class="container" id="app">
    </div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12">
                <h1 class="text-center display-2 mt-5 mb-4" style="color: white;">
                    <span style="font-weight: bold;">DEPARTMENT OF</span><br>
                    <span style="font-weight: bold;">COMPUTER SCIENCE AND ENGINEERING</span>
                </h1>
                <div class="d-flex flex-wrap justify-content-center mb-5">
                    <div class="card m-3 text-center" style="width: 18rem;">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">VIEW MY PROGRESS</h5>
                            <a href="student.php" class="btn btn-primary btn-sm align-self-center mt-auto" role="button">Click here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
