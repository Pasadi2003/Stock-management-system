<?php
require_once '../bootstrap.php';

/**
 * do not let anyone play with your URLs :>
 *
 */
LogInCheck();

if(isset($_GET['stock_id'])){
    require_once '../db.php';
    $sql = "DELETE FROM `stock` WHERE `stock_id` = '".$_GET['stock_id']."'";

    //use for MySQLi OOP
    if($conn->query($sql)){
        $_SESSION['success'] = 'Stock Item deleted successfully';
    }
    else
    {
        $_SESSION['error'] = 'Something went wrong in deleting member query';
    }
}
else{
    $_SESSION['error'] = 'Select stock to delete first';
}

header('location: ../stock.php');