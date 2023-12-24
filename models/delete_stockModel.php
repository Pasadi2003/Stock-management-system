<?php
// delete_stockModel.php

include_once('db.php');

if (isset($_GET['stock_id'])) {
    $stock_id = $_GET['stock_id'];
    
    // Perform the delete operation in the database
    $sql = "DELETE FROM stock WHERE stock_id = $stock_id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to the main page after successful deletion
        header("Location: allocate.php");
    } else {
        echo "Error deleting stock: " . $conn->error;
    }
} else {
    echo "Invalid request!";
}

$conn->close();
?>
