<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatibile" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>COLLEGE</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center"><strong>FACULTY COORDINATOR</strong></h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>FACULTY ID</th>
                                    <th>FACULTY NAME</th>
                                    <th>DEPARTMENT</th>
                                    <th>CONTACT INFO</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql="Select * from `coordinator`";
                                $result=mysqli_query($con,$sql);
                                if($result){
                                    while($row=mysqli_fetch_assoc($result)){
                                        $c_id=$row['c_id'];
                                        $c_name=$row['c_name'];
                                        $c_dept=$row['c_dept'];
                                        $c_contact=$row['c_contact'];

                                        echo'
                                        <tr>
                                            <td>'.$c_id.'</td>
                                            <td>'.$c_name.'</td>
                                            <td>'.$c_dept.'</td>
                                            <td>'.$c_contact.'</td>
                                            <td>
                                                <a href="update.php?updateid='.$c_id.'" class="btn btn-primary">Update</a>
                                            </td>
                                            <td>
                                                <a href="delete.php?deleteid='.$c_id.'" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                        <!-- Insert Button -->
                        <div class="text-center mt-3">
                            <a href="insert.php" class="btn btn-primary">Insert</a>
                            <a href="../frontpage.php" class="btn btn-secondary">HOME</a>
                        </div>
                        <!-- End Insert Button -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
