<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "stockphp";

$conn = new mysqli($server_name, $user_name, $password, $database);

if ($conn->connect_error) {
    die("Connection error");
}

// Trim values from POST
$req_item = trim($_POST['req_item']);
$req_item_cat = trim($_POST['stock_item_cat']);
$req_amount = trim($_POST['req_amount']);
$req_dept = trim($_POST['req_dept']);
$req_due_date = trim($_POST['req_due_date']);

// Prepare and execute the SQL query
$sql = "INSERT INTO `request` (`req_item`, `req_item_cat`, `req_amount`, `req_dept`, `req_due_date`) VALUES (?, ?, ?, ?, ?)";
$statement = $conn->prepare($sql);

// Bind parameters
$statement->bind_param("ssdss", $req_item, $req_item_cat, $req_amount, $req_dept, $req_due_date);

// Execute the query
$statement->execute();
header('location: ../req.php');
// Close the statement and connection
$statement->close();
$conn->close();
?>
