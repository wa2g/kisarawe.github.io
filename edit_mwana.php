<?php include 'connection.php';
   if(strlen($_SESSION['admin-success'])==0){
    header('location:login.php');
  } 

  if(isset($_POST['update'])){
    $plot_id=mysqli_real_escape_string($con,$_POST['plot_id']);
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $sname=mysqli_real_escape_string($con,$_POST['sname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $plota=mysqli_real_escape_string($con,$_POST['plota']);
    $total=mysqli_real_escape_string($con,$_POST['total']);
    $error=array();

    if(empty($plot_id)){
      array_push($error, "User ID is Required");
  }

   else if(empty($fname)){
        array_push($error, "First Name is Required");
    }
  
    else if(empty($lname)){
        array_push($error, "Last name is Required");
    }

    $id=$_GET['id'];

    $fuck = ($total * 0.63);
    $fuck1 = ($total * 0.27);
    $fuck2 = ($total * 0.10);
$result=mysqli_query($con, "UPDATE wananchi SET plot_id='$plot_id', fname='$fname', sname='$sname', lname='$lname',phone='$phone', plota='$plota', total='$total', owner='$fuck', wmc='$fuck1', kdc='$fuck2' WHERE id='$id'");
// $result=mysqli_query($con, "UPDATE viwanja SET total='$total', owner='$fuck', wmc='$fuck1', kdc='$fuck2' WHERE plot_id='$plot_id'");

if($result){
    header("location:wananchi.php");
    mysqli_error($con);
}



}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link href="img/logo/logo.png" rel="icon"> -->
  <title>Kisarawe - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <!-- <img src="img/logo/logo2.png"> -->
        </div>
        <div class="sidebar-brand-text mx-3">KISARAWE DATABASE</div>
      </a>
      <hr class="sidebar-divider my-0">
  
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
      </div>
     
      <li class="nav-item">
        <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="wananchi.php">
          <i class="fas fa-users"></i>
          <span>Wananchi</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="wmc.php">
          <i class="fas fa-globe"></i>
          <span>World Map Company</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="kdc.php">
          <i class="fas fa-industry"></i>
          <span>Kisarawe District Council</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="manage.php">
          <i class="fas fa-user"></i>
          <span>Manage User</span>
        </a>
      </li>
      
     
     
      
      <hr class="sidebar-divider">
      <!-- <div class="version" id="version-ruangadmin"></div> -->
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
  
           
            <li class="nav-item dropdown no-arrow mx-1">
              <!-- <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-tasks fa-fw"></i>
                <span class="badge badge-success badge-counter">3</span>
              </a> -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Task
                </h6>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Design Button
                      <div class="small float-right"><b>50%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Make Beautiful Transitions
                      <div class="small float-right"><b>30%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Create Pie Chart
                      <div class="small float-right"><b>75%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">View All Taks</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><strong><?php  echo $_SESSION['admin-success']; ?> </strong></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="login.html">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Edit Mwananchi Details</h1>
           
          </div>

          <center>
          <?php
// if(isset($_POST['update'])){
//     $fname=mysqli_real_escape_string($con,$_POST['fname']);
//     $sname=mysqli_real_escape_string($con,$_POST['sname']);
//     $lname=mysqli_real_escape_string($con,$_POST['lname']);
//     $phone=mysqli_real_escape_string($con,$_POST['phone']);
//     $plota=mysqli_real_escape_string($con,$_POST['plota']);
//     $total=mysqli_real_escape_string($con,$_POST['total']);
//     $id=$_GET['id'];

//     $fuck = ($total * 0.63);
//     $fuck1 = ($total * 0.27);
//     $fuck2 = ($total * 0.10);
// $result=mysqli_query($con, "UPDATE wananchi SET fname='$fname', sname='$sname', lname='$lname',phone='$phone', plota='$plota', total='$total', owner='$fuck', wmc='$fuck1', kdc='$fuck2' WHERE id='$id'");

// if($result){
//     header("location:wananchi.php");
//     mysqli_error($con);
// }



// }
$id=$_GET['id'];
$result=mysqli_query($con, "SELECT * FROM wananchi WHERE id= '$id'");
while($row= mysqli_fetch_assoc($result)) { ?>
<!-- <body style="background: #c0c4c4;"> -->
<div class="container" style="margin-top:5%">
<div class="row justify-content-center">
<div class="col-md-4">

<form class="box" action="" method="POST">
<?php if(!empty($error)){
						foreach($error as $err) { ?>

						<p class="alert alert-danger"><?php echo $err ?></p>
					<?php	}
					} ?>
<!-- <center><h4>Edit Mwananchi Details</h4></center> -->
<input type="text" name="plot_id" class="form-control" placeholder="Enter User ID" value="<?php echo $row['plot_id'];?>"><br>
<input type="text" name="fname" class="form-control" placeholder="Enter First Name" value="<?php echo $row['fname'];?>"><br>
<input type="text" name="sname" class="form-control" placeholder="Enter Second Name" value="<?php echo $row['sname'];?>"><br>
<input type="text" name="lname" class="form-control" placeholder="Enter Last Name" value="<?php echo $row['lname'];?>"><br>
<input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php echo $row['phone'];?>"><br>
<input type="text" name="plota" class="form-control" placeholder="Enter Plot Attained" value="<?php echo $row['plota'];?>"><br>
<input type="text" name="total" class="form-control" placeholder="Enter Total" value="<?php echo $row['total'];?>"><br>

<!-- <input type="text" name="yoe" class="form-control" placeholder="Year Of Exam" value="<?php echo $row['yoe'];?>"><br> -->
<input type="submit" name="update" class="btn btn-success" value="Update" style="margin-left:30%">
</div>
</div>
</div>

</form>
<?php

}    
?>
</center>
     

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>