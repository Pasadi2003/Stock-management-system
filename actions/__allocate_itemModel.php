<?php
require_once('../db.php'); // Include your database connection file

// Get values from the POST request (sanitize input to prevent SQL injection)
$dept_id = mysqli_real_escape_string($conn, $_POST['dept_id']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);
$stock_id = mysqli_real_escape_string($conn, $_POST['stock_id']); // Updated to match the input field's ID
$stock_name = mysqli_real_escape_string($conn, $_POST['stock_name']); // Updated to match the input field's ID

// Log the received data (for debugging purposes)
error_log("Received data: dept_id=$dept_id, amount=$amount, stock_id=$stock_id, stock_name=$stock_name");

echo($req_dept); //debug

//$sql = "UPDATE `stock` SET 
//`Amount` = `Amount`- $amount
//WHERE `Stock_Item_name` = 'Tikiri Marie Biscuit'";

if ($conn->query($sql) === TRUE) {
echo 'Updated successfully';
} else {
echo 'Error updating record: ' . $conn->error;
}

// Close the database connection
$conn->close();
?>
