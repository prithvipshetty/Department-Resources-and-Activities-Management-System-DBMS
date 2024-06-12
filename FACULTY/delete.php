<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $c_id=$_GET['deleteid'];
    $sql="delete from `coordinator` where c_id='$c_id'";
    $result=mysqli_query($con,$sql);
    if($result){
       header('location:index.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?> 