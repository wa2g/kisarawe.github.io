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
                <a class="dropdown-item" href="logout.php">
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
            <h1 class="h3 mb-0 text-gray-800"> Registered Users</h1>
           
          </div>

         
     
        <a href="adduser.php"><button type="button" class="btn btn-light mb-3" ><i class="fa fa-user-plus"> Add User</i></button></a>
        <a href="pdf_staff.php?id=id" class="btn btn-light mb-3" style="margin-left:70%"><i class="fa fa-file-pdf"> Download</i></a>
    <?php
        $result=mysqli_query($con,"SELECT * FROM users");
        if(mysqli_num_rows($result)>0){ ?>
    <table class="table table-bordered table-hover">
    <tr>
    <th>FIRST NAME</th>
    <th>LAST NAME</th>
    <th>USERNAME</th>
    <th>STATUS</th>
    <th>ROLE</th>
    <th>ADMIN'S ACTION</th>
</tr>
<?php
    while($row=mysqli_fetch_assoc($result)){ 
if($row['status']==1){
    $status ="Active";
    $color ='color:green';
}else{
    $status ="In Active";
    $color ='color:red'; 
}
if($row['role']==1){
    $role ='Admin';
    $colorr ='green';

}else{
    $role ='Normal user';
    $colorr ='blue';

}
if($row['role']==3){
  $role='Parent';
  $colorr='yellow';
}
    ?>
    <tr>
        <td><?php echo ucwords($row['fname']);?></td>
        <td><?php echo ucwords($row['lname']);?></td>
        <td><?php echo $row['username']?></td>
    <td><a style="<?php echo $color?>" href="changestatus.php?id=<?php echo $row['id'];?>"><?php echo $status;?></a></td>
    <td><a style="<?php echo $colorr?>" href="changerole.php?id=<?php echo $row['id'];?>"><?php echo $role;?></a></td>
        <td><a style="border-radius:24px;" href="editstaff.php?id=<?php echo $row['id'];?> "class="btn btn-sm btn-light"><i class="fa fa-edit"></i></a>
        <!-- <a style="border-radius:24px;" href="delete/deleteuser.php?id=<?php echo $row['id'];?>"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> -->
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['id'];?>"><i class="fa fa-trash"></i>
</button>
<div class="modal fade" id="exampleModalCenter<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure?.
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <a style="border-radius:24px;" href="delete/deleteuser.php?id=<?php echo $row['id'];?>"class="btn btn-sm btn-danger"> Delete</a>
        <!-- <button type="submit" class="btn btn-danger" name="sub">Delete</button> -->
        </form>
      </div>
    </div>
  </div>
</div>
      </td>
     
    </tr>
    
    <?php }?>
</table>
    <?php } ?>

    
    </div>
    
    </div>
      </div>
    </div>


  </div>
         

       
     

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