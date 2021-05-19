<?php include 'connection.php';
if(strlen($_SESSION['admin-success'])==0){
  header('location:login.php');
} else {
if(isset($_POST['submit'])){
    $plot_id=mysqli_real_escape_string($con,$_POST['plot_id']);
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $sname=mysqli_real_escape_string($con,$_POST['sname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    //$file=mysqli_real_escape_string($con,$_POST['file']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $plota=mysqli_real_escape_string($con,$_POST['plota']);
   $og=mysqli_real_escape_string($con,$_POST['og']);
    $total=mysqli_real_escape_string($con,$_POST['total']);
    $remark=mysqli_real_escape_string($con,$_POST['remark']);
    //$address=mysqli_real_escape_string($con,$_POST['address']);
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
    // else if(empty($phone)){
    //     array_push($error, "Phone number is Required");
    // }
  else if(empty($plota)){
    array_push($error, "Plot attained number is Required");
}
else if(empty($og)){
  array_push($error, "Original Area is Required");
}
    else if(empty($total)){
        array_push($error, "Total Amount For an Area is Required");
    }

else if(empty($file)){
  array_push($error, "PDF File is Required");
}

  
    
    $resume= ($_FILES['picha']['name']); 
    $tmp_kk = $_FILES['picha']['tmp_name']; 
    $ext = strrchr($resume, ".pdf");
    if ((($_FILES["picha"]["type"] != "application/pdf" )) && (($ext != ".pdf"))) 
    {  

      // echo "Insert a PDF file";
    } 
    else {  

/*            $type_allowed=array("image/jpg","image/jpeg","image/png");
            $type_allowed_f=array("image/jpg","image/jpeg","image/png","image/pdf");

            if(!in_array($type_kk,$type_allowed) AND !in_array($type_kk,$type_allowed)){
                  // echo "baba";
            }
            else{*/
     
                      $rand = rand();
                      $new_name = $rand."_".$resume;
                      $loc = "image/".$new_name;
                      move_uploaded_file($tmp_kk, $loc);
                      $fuck = ($total * 0.63);
                      $fuck1 = ($total * 0.25);
                      $fuck2 = ($total * 0.12);
                  // move_uploaded_file($tmp_mm, $loc2);
                   $result=mysqli_query($con,"INSERT INTO wananchi (plot_id,fname,sname,lname,phone,plota,og,total,remark,owner,wmc,kdc,file) 
                    VALUES ('$plot_id','$fname','$sname','$lname','$phone','$plota','$og','$total','$remark','$fuck','$fuck1','$fuck2','$new_name')");
                  //  $result=mysqli_query($con,"INSERT INTO viwanja (plot_id,total,owner,wmc,kdc,file)VALUES ('$plot_id','$total','$fuck','$fuck1','$fuck2','$new_name')");
                  //  $result=mysqli_query($con,$gg);
            
                    $_SESSION['success']= "New user is added successfully.";
                    header("location:wananchi.php");
                    // echo mysqli_error($con);
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
            <h1 class="h3 mb-0 text-gray-800"> Mwananchi Registration Form</h1>
           
          </div>

          <center>
          <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<div class="modal-body col-md-4">
        <form action="" method="POST" enctype="multipart/form-data">
        <?php if(!empty($error)){
						foreach($error as $err) { ?>

						<p class="alert alert-danger"><?php echo $err ?></p>
					<?php	}
					} ?>
            <input type="text" name="plot_id" class="form-control mb-2" placeholder="User ID" value="<?php if(isset($plot_id)){echo $plot_id;}?>">
            <input type="text" name="fname" class="form-control mb-2" placeholder="First Name" value="<?php if(isset($fname)){echo $fname;}?>">
            <input type="text" name="sname" class="form-control mb-2" placeholder="Second Name" value="<?php if(isset($sname)){echo $sname;}?>">
            <input type="text" name="lname" class="form-control mb-2" placeholder="Last Name" value="<?php if(isset($lname)){echo $lname;}?>">
            <input type="text" name="phone" class="form-control mb-2" placeholder="Phone Number" value="<?php if(isset($phone)){echo $phone;}?>">
            <input type="text" name="plota" class="form-control mb-2" placeholder="Plot Attained" value="<?php if(isset($plota)){echo $plota;}?>">
            <input type="text" name="og" class="form-control mb-2" placeholder="Original Area" value="<?php if(isset($og)){echo $og;}?>">
            <input type="text" name="total" class="form-control mb-2" placeholder="Total Area" value="<?php if(isset($total)){echo $total;}?>">
            <textarea name="remark" class="form-control mb-2" placeholder="Remark"></textarea>
            <!-- <input type="text" name="remark" class="form-control mb-2" placeholder="Remark" value="<?php if(isset($remark)){echo $remark;}?>">            -->
             Upload Map
            <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name="picha" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
           

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