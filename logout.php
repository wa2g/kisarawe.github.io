
<?php
session_start(); 
include 'connection.php';
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 1*1,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['login']);
session_destroy(); // destroy session
header("location:login.php"); 
?>