<!-- <?php 

	// session_start();
	$_SESSION['mwana_id'] = $id;
 ?> -->

<?php include 'connection.php';
if(strlen($_SESSION['admin-success'])==0){
  header('location:login.php');
} else {
$output = '';
if(isset($_POST['search'])){
$searchq = $_POST['search'];
$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

$result=mysqli_query($con, "SELECT * FROM wananchi WHERE fname LIKE '%$searchq%' OR sname LIKE '%$searchq%' OR lname LIKE '%$searchq%'");
$count = mysqli_num_rows($result);
mysqli_error($con);
if($count == 0){
  $output = 'There was no search result for this!';
}else{
  while($row = mysqli_fetch_assoc($result)){
    $fname = ucwords($row['fname']);
    $sname = ucwords($row['sname']);
    $lname = ucwords($row['lname']);
    $plota = ucwords($row['plota']);
    $phone = $row['phone'];
    $total = $row['total'];
    $agree = ucwords($row['agree']);
    // $address = ucwords($row['address']);
    $id = $row['id'];
    $output .= '<div> '.$fname.''.$sname.''.$lname.'</div>';
    
  }
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
            <h1 class="h3 mb-0 text-gray-800"> Wananchi</h1>
           
          </div>
          <div class="container-fluid">
        <center>
        <form action="" method="POST">
        <input type="text" name="search" placeholder="Search" class="col-md-4 mb-2 form-control" required>
        <input type="submit" value="Search" class="btn btn-light">
        </form>
        <!-- <?php print("$output"); ?> -->

<a href="mwananchi_info.php"><button type="button" class="btn btn-light mb-3" ><i class="fa fa-registered"> Mwananchi Registration </i></button></a>


    <a href="pdfwana.php?id=id" class="btn btn-light mb-3" style="margin-left:66%"><i class="fa fa-file-pdf"> Download</i></a>
    <?php 
    $result = mysqli_query($con, "SELECT * FROM wananchi ORDER BY `fname` ASC");
    if(mysqli_num_rows($result)>0){ ?>
    <table class="table table-bordered table-hover">
    <tr>
      <!-- <th>USER ID</th> -->
    <th>FIRST NAME</th>
    <!-- <th>SECOND NAME</th> -->
    <th>LAST NAME</th>
    <th>PHONE NO</th>
    <th>PLOT ATTAINED</th>
    <th>TOTAL AREA</th>
    <th>AGREEMENT</th>
    <!-- <th>WMC SHARES</th>
    <th>KDC SHARES</th> -->
    <th>VIEW</th>
    <th>ACTIONS</th>
   
   
  
    </tr>
    <?php 
    if(empty($output)){
    while($row = mysqli_fetch_assoc($result)){ 
      if($row['agree']==1){
        $agree ="Yes";
        $color ='color:green';
    }else{
        $agree ="No";
        $color ='color:red'; 
    }
      ?>
      <tr>
      <!-- <td><?php echo $row['plot_id']; ?></td> -->
      <td><?php echo ucwords($row['fname']); ?></td>
      <td><?php echo ucwords($row['lname']); ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['plota']; ?></td>
      <td><?php echo $row['total']; ?></td>
      <td><a style="<?php echo $color?>" href="changeagree.php?id=<?php echo $row['id'];?>"><?php echo $agree;?></a></td>
      <!-- <td><?php echo $row['wmc']; ?></td>
      <td><?php echo $row['kdc']; ?></td> -->
      <!-- <td><?php echo ucwords($row['address']); ?></td> -->

      <td><a href="viewmore.php?id=<?php echo $row['id'];?>" style="text-decoration:none;">View More</a>

      <td><a style="border-radius:24px;" href="add_plot.php?id=<?php echo $row['id'];?> "class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
        <a style="border-radius:24px;" href="edit_mwana.php?id=<?php echo $row['id'];?> "class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
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
       <a style="border-radius:24px;" href="delete/deletemwana.php?id=<?php echo $row['id'];?>"class="btn btn-sm btn-danger"> Delete</a>
        <!-- <button type="submit" class="btn btn-danger" name="sub">Delete</button> -->
        </form>
      </div>
    </div>
  </div>
</div></td>  
      </tr>
<?php }
    }else{ 
      if(!empty($fname)){ 
        
      ?>
      <tr>
      <td><?php echo $fname ?></td>
      <td><?php echo $lname ?></td>
      <td><?php echo $phone ?></td>
      <td><?php echo $plota ?></td>
      <td><?php echo $total ?></td>
      <td><?php echo $agree ?></td>
      <!-- <td><?php echo $id ?></td> -->
      <td><a href="viewmore.php?id=<?php echo $id ?>" style="text-decoration:none;">View More</a>
<td><a style="border-radius:24px;" href="edituser.php?id=<?php echo $id ?> "class="btn btn-sm btn-light"><i class="fa fa-edit"></i></a>
        <a style="border-radius:24px;" href="delete/delete.php?id=<?php echo $id ?>"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
      <?php } else{
          echo "No data for this entry!"; 
      }?>
      </tr>
  <?php  }
 ?>
</table>
<?php }
?>

    </table>


    
    </div>

  </div>
</center>

      
      <!-- Footer -->
      <!-- <footer class="sticky-footer bg-white" style="margin-top: 26.5%;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; 2019 - developed by
              <b><a href="https:#" target="_blank">iCode</a></b>
            </span>
          </div>
        </div>
      </footer> -->
      <!-- Footer -->
    <!-- </div>
  </div> -->

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