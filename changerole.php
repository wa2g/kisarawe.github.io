<?php
include 'connection.php';
$id=$_GET['id'];
$result=mysqli_query($con, "SELECT * FROM users WHERE id= '$id'");
    while($row = mysqli_fetch_assoc($result)){
        if($row['role']== 1){
            mysqli_query($con, "UPDATE users SET role = 0 WHERE id= '$id'");
            header("location:manage.php");
            
        }else{
            mysqli_query($con ,"UPDATE users SET role = 1 WHERE id= '$id'");
            header("location:manage.php");
        }
    }

?>