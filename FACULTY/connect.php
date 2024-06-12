<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABaSE='college';


$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABaSE);
if($con){
    echo "connection successful";
}else{
    die(mysqli_error($con));
}
?>