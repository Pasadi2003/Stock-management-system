<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "stockphp";

$conn = new mysqli($server_name, $user_name, $password, $database);

if ($conn->connect_error) {
    die("Connection error");
} 

//trim values from POST

//trim values from POST
$req_id = trim($_POST['req_id']);
$req_amount = trim($_POST['req_amount']);
$req_trans_date = trim($_POST['req_trans_date']);
$req_rece_date = trim($_POST['req_rece_date']);
$req_status = trim($_POST['req_status']);

// Prepare placeholders and types for binding
$placeholders = '';
$types = '';
$bindParams = [$types];

// Check and build the SQL statement dynamically
$sql = "UPDATE `request` SET ";

// Check and build the bind parameters dynamically
if (!empty($req_amount)) {
    $sql .= "`req_amount` = ?, ";
    $placeholders .= 's';
    $bindParams[] = &$req_amount;
}


if (!empty($req_status)) {
    $sql .= "`req_status` = ?, ";
    $placeholders .= 's';
    $bindParams[] = &$req_status;
}

// Remove the trailing comma and space
$sql = rtrim($sql, ', ');

// Add the WHERE clause
$sql .= " WHERE `request`.`req_id` = ?";

// Add the type for the WHERE clause
$placeholders .= 's';
$bindParams[0] .= $placeholders;
$bindParams[] = &$req_id;

// Prepare the statement
$statement = $conn->prepare($sql);

// bind parameters dynamically
call_user_func_array([$statement, 'bind_param'], $bindParams);
header('location: ../req.php');
// execute the statement
$statement->execute();
$statement->close();
$conn->close();

