<?php
session_start(); // Make sure to start the session

$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "stockphp";

$conn = new mysqli($server_name, $user_name, $password, $database);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// Trim values from POST
$req_item = trim($_POST['req_item']);
$req_amount = trim($_POST['req_amount']);
$req_dept = trim($_POST['req_dept']);
$req_status = trim($_POST['req_status']);
$req_item_cat = trim($_POST['req_item_cat']);
$req_item_exp = trim($_POST['req_item_exp']);
$req_dept_id = trim($_POST['req_dept_id']);



// Insert data into the item table
$sqlItem = "INSERT INTO `item` (`item_name`, `Amount`, `item_cat`, `item_detail`, `req_dept_id`) VALUES (?, ?, ?, ?, ?)";
$statementItem = $conn->prepare($sqlItem);
$statementItem->bind_param("sdssi", $req_item, $req_amount, $req_item_cat, $req_item_exp, $req_dept_id);
$statementItem->execute();
$statementItem->close();

if ($statementItem) {
    $_SESSION['success'] = 'Item added to branch successfully';
   
    header('location: ../allocate.php');
} else {
    $_SESSION['error'] = 'Something went wrong while adding item to branch';
   
    header('location: ../allocate.php');
}

$conn->close();
?>
