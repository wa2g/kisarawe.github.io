<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($con, $_POST['username']);
    $password=mysqli_real_escape_string($con, $_POST['password']);
    $error=array();

    if(empty($username)){
        array_push($error, 'Username is required');
    }
    if(empty($password)){
        array_push($error, 'Password is required');
    }
    if(empty($error)){
        $result=mysqli_query($con, "SELECT * FROM users WHERE username='$username'" );
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_array($result);
             if(password_verify($password, $row['password'])){
                if($row['status']==1){
                    if($row['role']==1){
                        $_SESSION['admin-success']=$username;
                        header('location:index.php');
                    }else if($row['role']==0){
                        $_SESSION['username']=$username;
                        header('location:normaluser.php');
                    }
                }else{
                    $msg= "You are not activated contact your admin";
                }
           }else{
                $msg= "Wrong Password";
            }
		}else{
			$msg="Invalid User";
		}
	}else {
	// $msg="Login credentials are required";
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
  <title>Kisarawe - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form method="POST" action="#" class="form-horizontal">
                  <?php if(!empty($error)){
						foreach($error as $err) { ?>

						<p class="alert alert-danger"><?php echo $err ?></p>
					<?php	}
					} ?>
				<?php if(isset($msg)){ echo $msg;}?>
                    <div class="form-group">
                      <input type="text" class="form-control" name="username"  value="<?php if(isset($_POST['username'])){ echo $_POST['username']; }?>" aria-describedby="emailHelp"
                        placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div> -->
                    <hr>
                    <div class="form-group">
                      <!-- <a href="index.html" class="btn btn-primary btn-block">Login</a> -->
                      <button class="btn btn-primary" type="submit" name="submit" style="width:332px;"> Login </button>   
                    </div>
                  
            
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="font-weight-bold small" href="register.html">Create an Account!</a>
                  </div> -->
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>