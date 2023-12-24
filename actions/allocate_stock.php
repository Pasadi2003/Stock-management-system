<!--allocate_stock.php-->
<?php
// Include your database connection file
require_once 'bootstrap.php';

// Retrieve the department ID and allocated amount from the request
$deptId = $_POST['deptId']; // You need to use the correct parameter name used in your HTML/JavaScript
$allocatedAmount = $_POST['allocatedAmount']; // You need to use the correct parameter name used in your HTML/JavaScript

// Query to update the stock in the department
$sql = "UPDATE item SET Amount = Amount - $allocatedAmount WHERE dept_id = '$deptId'";
if ($conn->query($sql) === TRUE) {
    echo 'updated'; // The database was updated successfully
} else {
    echo 'error'; // There was an error updating the database
}

// Close the database connection
$conn->close();
?>
