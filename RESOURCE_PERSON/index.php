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
                        <h2 class="display-6 text-center"><strong>RESOURCE PERSON</strong></h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>RESOURCE PERSON ID</th>
                                    <th>RESOURCE PERSON NAME</th>
                                    <th>CONTACT INFO</th>
                                    <th>TITLE OF POSITION</th>
                                    <th>EXPERTISE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql="Select * from `resource_person`";
                                $result=mysqli_query($con,$sql);
                                if($result){
                                    while($row=mysqli_fetch_assoc($result)){
                                        $person_id=$row['person_id'];
                                        $p_name=$row['p_name'];
                                        $p_contact=$row['p_contact'];
                                        $title_of_position=$row['title_of_position'];
                                        $p_expertise=$row['p_expertise'];

                                        echo'
                                        <tr>
                                            <td>'.$person_id.'</td>
                                            <td>'.$p_name.'</td>
                                            <td>'.$p_contact.'</td>
                                            <td>'.$title_of_position.'</td>
                                            <td>'.$p_expertise.'</td>
                                            <td>
                                                <a href="update.php?updateid='.$person_id.'" class="btn btn-primary">Update</a>
                                            </td>
                                            <td>
                                                <a href="delete.php?deleteid='.$person_id.'" class="btn btn-danger">Delete</a>
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
