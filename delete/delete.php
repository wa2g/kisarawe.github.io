<?php 
include '../connection.php';

$plot_no =$_GET['plot_no'];

mysqli_query($con, "DELETE FROM wmc WHERE plot_no = '$plot_no'");
header("location:../wmc.php");
mysqli_error($con);
?>
