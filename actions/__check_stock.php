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

// Insert data into the request table
$sqlRequest = "INSERT INTO `request` (`req_item`, `req_amount`, `req_dept`, `req_status`, `req_item_cat`, `req_item_exp`, `req_dept_id`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$statementRequest = $conn->prepare($sqlRequest);
$statementRequest->bind_param("sdssssi", $req_item, $req_amount, $req_dept, $req_status, $req_item_cat, $req_item_exp, $req_dept_id);
$statementRequest->execute();
$statementRequest->close();


// Assuming $stock_id is the ID of the stock item you are updating
// You need to replace this with the correct stock_id retrieval logic
$stock_id = 1; // Replace with your actual stock_id

// Update stock table
$sqlUpdateStock = "UPDATE `stock` SET `Amount` = (`Amount` - ?) WHERE `stock_id` = ?";
$statementUpdateStock = $conn->prepare($sqlUpdateStock);
$statementUpdateStock->bind_param("di", $req_amount, $stock_id);
$statementUpdateStock->execute();
$statementUpdateStock->close();

// Insert data into the item table
//$sqlItem = "INSERT INTO `item` (`item_name`, `Amount`, `item_cat`, `item_detail`, `req_dept_id`) VALUES (?, ?, ?, ?, ?)";
//$statementItem = $conn->prepare($sqlItem);
//$statementItem->bind_param("sdsdi", $req_item, $req_amount, $req_item_cat, $req_item_exp, $req_dept_id);
//$statementItem->execute();
//$statementItem->close();

$_SESSION['success'] = 'Item allocated successfully';
header('location: ../allocate.php');

$conn->close();
?>
