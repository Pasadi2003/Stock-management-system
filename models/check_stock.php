<!--check_stock.php-->
<?php

// check_stock.php

// Assuming you have a database connection established
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize POST data
    $dept_id = filter_input(INPUT_POST, 'dept_id', FILTER_SANITIZE_STRING);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_INT);

    // Check if there's enough stock available
    $sql = "SELECT COUNT(*) AS stock_count FROM stock WHERE dept_id = $dept_id AND amount >= $amount";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stockCount = $row['stock_count'];

        if ($stockCount > 0) {
            // Enough stock available
            echo 'success';
        } else {
            // Not enough stock available
            echo 'error';
        }
    } else {
        // Error in the database query
        echo 'error';
    }
} else {
    // Invalid request method
    echo 'error';
}

?>
