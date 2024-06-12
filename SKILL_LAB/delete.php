<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $skilllab_id=$_GET['deleteid'];
    $sql="delete from `skill_lab` where skilllab_id='$skilllab_id'";
    $result=mysqli_query($con,$sql);
    if($result){
       header('location:index.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>