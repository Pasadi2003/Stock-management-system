<?php



require_once 'bootstrap.php';
LogInCheck();

if($_SESSION['role'] != 'admin')
{
    header('location: admin_home.php');
}

$result = backDb('localhost','root','','stock');
if( $result == 1)
{
    // $_SESSION['success'] = 'back up taken successfully';
    echo '<script>location.href = "admin_home.php";</script>';

}
else{
    $_SESSION['error'] = 'something went wrong ';
    header('location: admin_home.php');
}

