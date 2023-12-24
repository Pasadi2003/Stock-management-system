<?php
require_once '../bootstrap.php';

/**
 * do not let anyone play with your URLs :>
 *
 */
LogInCheck();

if(isset($_GET['req_id'])){
    require_once '../db.php';
    $sql = "DELETE FROM `request` WHERE `req_id` = '".$_GET['req_id']."'";

    //use for MySQLi OOP
    if($conn->query($sql)){
        $_SESSION['success'] = 'Stock Request deleted successfully';
    }
    else
    {
        $_SESSION['error'] = 'Something went wrong in deleting member query';
    }
}
else{
    $_SESSION['error'] = 'Select stock to delete first';
}

header('location: ../req.php');