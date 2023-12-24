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
$stock_id = $_POST['stock_id'];
$Stock_Item_name = trim($_POST['stock_name']);
$Stock_Item_cat = trim($_POST['stock_cat']);
$Amount = trim($_POST['amount']);
$Stock_Item_detail = trim($_POST['stock_exp']);
$Stock_supplied_date = trim($_POST['date']);

$sql = "UPDATE `stock` SET 
        `Stock_Item_name` = ?,
        `Stock_Item_detail` = ?,
        `Stock_Item_cat` = ?,
        `Amount` = ?,
        `Stock_supplied_date` = CURDATE()
        WHERE `stock`.`stock_id` = ?";

$statement = $conn->prepare($sql);

// Bind parameters
$statement->bind_param("sssds", $Stock_Item_name, $Stock_Item_detail, $Stock_Item_cat, $Amount,  $stock_id);
header('location: ../stock.php');

$statement->execute();
$statement->close();
$conn->close();
?>



