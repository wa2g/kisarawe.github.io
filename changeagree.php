<?php
include 'connection.php';
$id=$_GET['id'];
$result=mysqli_query($con, "SELECT * FROM wananchi WHERE id= '$id'");
    while($row = mysqli_fetch_assoc($result)){
        if($row['agree']== 1){
            mysqli_query($con, "UPDATE wananchi SET agree = 0 WHERE id= '$id'");
            header("location:wananchi.php");
            
        }else{
            mysqli_query($con ,"UPDATE wananchi SET agree = 1 WHERE id= '$id'");
            header("location:wananchi.php");
        }
    }

?>