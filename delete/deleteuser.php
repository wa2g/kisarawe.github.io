<?php 
include '../connection.php';

$id =$_GET['id'];

$result="DELETE FROM users WHERE id = '$id'";
$fire=mysqli_query($con,$result) or die("Can not delete the data from the database.".mysqli_error($con));
if($fire){
    echo "Data Deleted from database";
    header("location:../manage.php");
}

// mysqli_error($con);
?>
