<!-- weka  hz code uko kwa hilo page inayokuleta hapa and uweke id-->

<!-- hbjh -->

<?php include 'connection.php';
if(strlen($_SESSION['admin-success'])==0){
  header('location:login.php');
} else {
if(isset($_POST['submit'])){
    $plot_no=mysqli_real_escape_string($con,$_POST['plot_no']);
    $plot_size=mysqli_real_escape_string($con,$_POST['plot_size']);
    $error=array();

    if(empty($plot_no)){
        array_push($error, "Plot number is Required");
    }
    else if(empty($plot_size)){
      array_push($error, "Plot size is Required");
  }
  
    				$wananchiid = $_SESSION['mwana_id'];
                   $result=mysqli_query($con,"INSERT INTO viwanja (plot_no,plot_size,wananchiid) VALUES ('$plot_no','$plot_size','$wananchiid')");
                    //  $result=mysqli_query($con,$gg);
                    echo mysqli_error($con);
            
                    $_SESSION['success']= "new user is added successfully.";
                    // header("location:wananchi.php");
                    // echo mysqli_error($con);
              
    
    
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
            <h1 class="h3 mb-0 text-gray-800"> Add Mwananchi Plot Details</h1>
           
          </div>

          <center>
          <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<div class="modal-body col-md-4">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="plot_no" class="form-control mb-2" placeholder="Enter Plot Number" value="<?php if(isset($plot_no)){echo $plot_no;}?>">
            <input type="text" name="plot_size" class="form-control mb-2" placeholder="Enter Plot Size" value="<?php if(isset($plot_size)){echo $plot_size;}?>">
            <!-- <input type="text" name="fname" class="form-control mb-2" placeholder="First Name" value="<?php if(isset($fname)){echo $fname;}?>">
            <input type="text" name="sname" class="form-control mb-2" placeholder="Second Name" value="<?php if(isset($sname)){echo $sname;}?>">
            <input type="text" name="lname" class="form-control mb-2" placeholder="Last Name" value="<?php if(isset($lname)){echo $lname;}?>">
            <input type="text" name="phone" class="form-control mb-2" placeholder="Phone Number" value="<?php if(isset($phone)){echo $phone;}?>">  -->
            <!-- <input type="text" name="plota" class="form-control mb-2" placeholder="Plot Attained" value="<?php if(isset($plota)){echo $plota;}?>">  -->
          
           

             <input type="submit" name="submit" class="btn btn-primary">
        </form>
       
      </div>
</div>
</div>
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
<?php } ?>