<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $person_id=$_GET['deleteid'];
    $sql="delete from `resource_person` where person_id='$person_id'";
    $result=mysqli_query($con,$sql);
    if($result){
       header('location:index.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>