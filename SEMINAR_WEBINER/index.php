<?php
include 'connect.php';

// Sorting logic
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'latest';
$sortOptions = ['latest', 'oldest'];
if (!in_array($sort, $sortOptions)) {
    $sort = 'latest'; // Default sorting option
}

// Searching logic
$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchQuery = $search ? "WHERE w.ws_title LIKE '%$search%'" : '';

$sql = "SELECT w.*, COUNT(we.USN) AS enrollment 
        FROM seminar_webiner w 
        LEFT JOIN ws_enroll we ON w.ws_id = we.ws_id 
        $searchQuery
        GROUP BY w.ws_id
        ORDER BY w.ws_date " . ($sort == 'latest' ? 'DESC' : 'ASC');

$result = mysqli_query($con, $sql);
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>COLLEGE</title>
    <style>
        /* Enlarge the size of search bar */
        .form-control {
            width: 300px; /* Adjust as needed */
            font-size: 16px; /* Adjust as needed */
        }

        /* Enlarge the size of sort dropdown button */
        .dropdown-toggle {
            font-size: 16px; /* Adjust as needed */
            padding: 10px 20px; /* Adjust as needed */
        }
    </style>
</head>
<body class="bg-dark">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <!-- Your Logo Here -->
                <!-- Example: <img src="logo.png" alt="Logo"> -->
            </a>
            <form class="d-flex" method="GET" action="">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort By
                </button>
                <ul class="dropdown-menu" aria-labelledby="sortDropdownMenuButton">
                    <li><a class="dropdown-item" href="?sort=latest">Latest</a></li>
                    <li><a class="dropdown-item" href="?sort=oldest">Oldest</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center"><strong>SEMINAR/WEBINAR</strong></h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>SEMINAR/WEBINAR ID</th>
                                    <th>TITLE</th>
                                    <th>LOCATION</th>
                                    <th>TIME</th>
                                    <th> DATE</th>
                                    <th>MODE</th>
                                    <th>RESOURCE PERSON ID</th>
                                    <th>COORDINATOR(S) ID</th>
                                    <th>ENROLLMENT</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $ws_id = $row['ws_id'];
                                        $ws_title = $row['ws_title'];
                                        $ws_location = $row['ws_location'];
                                        $ws_time = $row['ws_time'];
                                        $ws_date = $row['ws_date'];
                                        $mode = $row['mode'];
                                        $person_id = $row['person_id'];
                                        $c_ids = explode(',', $row['c_id']); // Assuming coordinator IDs are stored as comma-separated values

                                        // Format coordinator IDs
                                        $coordinator_links = '';
                                        foreach ($c_ids as $c_id) {
                                            $coordinator_links .= '<a href="get_coordinator.php?c_id=' . $c_id . '">' . $c_id . '</a>, ';
                                        }
                                        $coordinator_links = rtrim($coordinator_links, ', ');

                                        $enrollment = $row['enrollment'];

                                        echo '
                                        <tr>
                                            <td>' . $ws_id . '</td>
                                            <td>' . $ws_title . '</td>
                                            <td>' . $ws_location . '</td>
                                            <td>' . $ws_time . '</td>
                                            <td>' . $ws_date . '</td>
                                            <td>' . $mode . '</td>
                                            <td><a href="get_resource_person.php?person_id=' . $person_id . '">' . $person_id . '</a></td>
                                            <td>' . $coordinator_links . '</td>
                                            <td><a href="get_enrollment.php?ws_id=' . $ws_id . '">' . $enrollment . '</a></td>
                                            <td>
                                                <a href="update.php?updateid=' . $ws_id . '" class="btn btn-primary">Update</a>
                                            </td>
                                            <td>
                                                <a href="delete.php?deleteid=' . $ws_id . '" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <a href="insert.php" class="btn btn-primary">Insert</a>
                            <a href="../frontpage.php" class="btn btn-secondary">HOME</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
