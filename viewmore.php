<?php
include 'connection.php';
if(strlen($_SESSION['admin-success'])==0){
  header('location:login.php');
} else {
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
            <h1 class="h3 mb-0 text-gray-800"> Full Information</h1>
           
          </div>
          <table style="margin-left:10%">
          <?php
        $id=$_GET['id'];
        $result=mysqli_query($con, "SELECT * FROM wananchi where id = '$id'");
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){?>
          <a href="pdfviewmore.php?id=<?php echo $row['id'];}}?>" class="btn btn-light mb-3" style="margin-left:66%"><i class="fa fa-file-pdf"> Download</i></a>
          <tr>
   
   <td>User ID: <?php 
           $id=$_GET['id'];
           $result=mysqli_query($con, "SELECT plot_id FROM wananchi WHERE id='$id'");
           if(mysqli_num_rows($result)>0){
           while($row = mysqli_fetch_assoc($result)){ ?>
           <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($row['plot_id']); }}?></strong></td>
</tr>
     <tr>
   
    <td>First Name: <?php 
            $id=$_GET['id'];
            $result=mysqli_query($con, "SELECT fname FROM wananchi WHERE id='$id'");
            if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){ ?>
            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($row['fname']); }}?></strong></td>
 </tr>

 <tr>
   
   <td>Second Name: <?php 
           $id=$_GET['id'];
           $result=mysqli_query($con, "SELECT sname FROM wananchi WHERE id='$id'");
           if(mysqli_num_rows($result)>0){
           while($row = mysqli_fetch_assoc($result)){ ?>
           <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($row['sname']); }}?></strong></td>
</tr>

<tr>
   
   <td>Last Name: <?php 
           $id=$_GET['id'];
           $result=mysqli_query($con, "SELECT lname FROM wananchi WHERE id='$id'");
           if(mysqli_num_rows($result)>0){
           while($row = mysqli_fetch_assoc($result)){ ?>
           <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($row['lname']); }}?></strong></td>
</tr>

 <tr>
    <td>Phone No: <?php 
            $id=$_GET['id'];
            $result=mysqli_query($con, "SELECT phone FROM wananchi WHERE id='$id'");
            if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){ ?>
            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row['phone']); }}?></strong> </td>
            </tr>

            <tr>

            <tr>
    <td>Plot Attained: <?php 
            $id=$_GET['id'];
            $result=mysqli_query($con, "SELECT plota FROM wananchi WHERE id='$id'");
            if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){ ?>
            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row['plota']); }}?></strong> </td>
            </tr>

            <td>Original Area: <?php 
            $id=$_GET['id'];
            $result=mysqli_query($con, "SELECT og FROM wananchi WHERE id='$id'");
            if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){ ?>
            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row['og']); }}?></strong> </td>
            </tr>

            <tr>
   <td>Total Area <?php 
            $id=$_GET['id'];
            $result=mysqli_query($con, "SELECT total FROM wananchi WHERE id='$id'");
            if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){ ?>
            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['total'];?></strong>
            <?php }}?></td>
            </tr>
            <tr>
    <td>Owner's Shares: <?php 
            $id=$_GET['id'];
            $result=mysqli_query($con, "SELECT owner FROM wananchi WHERE id='$id'");
            if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){ ?>
            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['owner']; }}?></strong></td>
            </tr>
            <tr>
   <td>World Map Shares: <?php 
            $id=$_GET['id'];
            $result=mysqli_query($con, "SELECT wmc FROM wananchi WHERE id='$id'");
            if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){ ?>
            <strong><?php echo $row['wmc']; }}?></strong></td>
            </tr>
<tr>
    <td>Kisarawe District Council Shares: <?php 
            $id=$_GET['id'];
            $result=mysqli_query($con, "SELECT kdc FROM wananchi WHERE id='$id'");
            if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){ ?>
            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($row['kdc']); }}?></strong></td>
            </tr>

            <td>Remark: <?php 
            $id=$_GET['id'];
            $result=mysqli_query($con, "SELECT remark FROM wananchi WHERE id='$id'");
            if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){ ?>
            <strong><?php echo $row['remark']; }}?></strong></td>
            </tr>
            </table>
    <?php
        $id=$_GET['id'];
        $result=mysqli_query($con, "SELECT * FROM wananchi where id = '$id'");
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){?>
          
         <a href="image/<?php echo $row['file']; } } ?>" style="text-decoration:none;"> <div class="panel-heading text-center mb-5" style="margin-left:41.5%"><h4> View Map</h4></div></a>

         
         <table class="table table-bordered table-hover">
<?php
$matokeo=mysqli_query($con, "SELECT plot_no,plot_size FROM viwanja WHERE wananchiid='$id'");
   if(mysqli_num_rows($matokeo)>0){ ?>
    
 
<tr>
<th><strong>Plot Number</strong></th>
<th><strong>Plot Size</strong></th>
<!-- <th><strong>Action</strong></th> -->

</tr>
<?php while($row = mysqli_fetch_assoc($matokeo)){ ?>
<tr>
<td><?php echo $row['plot_no'];  ?></td>
<td><?php echo $row['plot_size']; } ?></td>
<!-- <td><a style="border-radius:24px;" href="add_plot.php?id=<?php echo $row['id']; ?> "class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a></td> -->
<?php } ?>
   </tr>
   </table>    
     

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