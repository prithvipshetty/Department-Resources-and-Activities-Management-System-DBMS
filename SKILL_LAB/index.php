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
                        <h2 class="display-6 text-center"><strong>SKILL LAB</strong></h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>SKILL LAB ID</th>
                                    <th>TITLE</th>
                                    <th>SKILL LAB TYPE</th>
                                    <!-- <th>SKILL LAB TIME</th> -->
                                    <th>SKILL LAB START DATE</th>
                                    <th>SKILL LAB END DATE</th>

                                    <th>SKILL LAB SEMESTER</th>
                                    <!-- <th>RESOURCE PERSON ID</th>
                                    <th>COORDINATOR ID</th> -->
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql="Select * from `skill_lab`";
                                $result=mysqli_query($con,$sql);
                                if($result){
                                    while($row=mysqli_fetch_assoc($result)){
                                        $skilllab_id=$row['skilllab_id'];
                                        $sl_topic=$row['sl_topic'];
                                        $sl_type=$row['sl_type'];
                                        // $w_time=$row['w_time'];
                                        $sl_start_date=$row['sl_start_date'];
                                        $sl_end_date=$row['sl_end_date'];

                                        $sl_sem=$row['sl_sem'];
                                        // $person_id=$row['person_id'];
                                        // $c_id=$row['c_id'];

                                        echo'
                                        <tr>
                                            <td>'.$skilllab_id.'</td>
                                            <td>'.$sl_topic.'</td>
                                            <td>'.$sl_type.'</td>
                                            <td>'.$sl_start_date.'</td>
                                            <td>'.$sl_end_date.'</td>

                                            <td>'.$sl_sem.'</td>
                                           
                                            <td>
                                                <a href="update.php?updateid='.$skilllab_id.'" class="btn btn-primary">Update</a>
                                            </td>
                                            <td>
                                                <a href="delete.php?deleteid='.$skilllab_id.'" class="btn btn-danger">Delete</a>
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
