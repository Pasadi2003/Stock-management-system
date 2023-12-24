<!--update_stockModel.php-->

<?php
// Check if the form is submitted for stock update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_stock'])) {
    // Include database configuration
    require_once('db.php');

    // Get the data from the POST request
    $stockId = $_POST['stockId'];
    $stockName = $_POST['stockName'];
    $stockCat = $_POST['stockCat'];
    $stockDetail = $_POST['stockDetail'];
    $stockSupplier = $_POST['stockSupplier'];
    $stockAmount = $_POST['stockAmount'];
    $stockDate = $_POST['stockDate'];

    // Perform the update operation (replace this with your actual update query)
    $sql = "UPDATE stock 
            SET Stock_Item_name = '$stockName', 
                Stock_Item_cat = '$stockCat',
                Stock_Item_detail = '$stockDetail',
                Stock_item_supplier = '$stockSupplier',
                Amount = '$stockAmount',
                Stock_supplied_date = '$stockDate'
            WHERE stock_id = $stockId";

    $result = $conn->query($sql);

    // Check if the update was successful
    if ($result) {
        echo 'updated';
    } else {
        echo 'error';
    }

    // Close the database connection
    $conn->close();
}
?>
