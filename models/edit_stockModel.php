<?php
include_once('db.php');

// Add this condition to check if the stock_id is set in the URL
if (isset($_GET['stock_id'])) {
    $stock_id = $_GET['stock_id'];

    // Fetch stock information from the database based on stock_id
    $sql = "SELECT * FROM stock WHERE stock_id = $stock_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $stockData = $result->fetch_assoc();

        // Now, you can use $stockData to pre-fill the edit form fields
        // For example: $stockData['Stock_Item_name'], $stockData['Stock_Item_cat'], etc.
        // Add your HTML form here with the pre-filled values
        echo json_encode($stockData); // Send the stock data as JSON
    } else {
        echo json_encode(array('error' => 'Stock not found!')); // Send an error message as JSON
    }
} else {
    echo json_encode(array('error' => 'Invalid request!')); // Send an error message as JSON
}

$conn->close();
?>
