
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
$Stock_item_name = trim($_POST['stock_name']);
$Stock_item_cat = trim($_POST['stock_cat']);
$AMOUNT = trim($_POST['amount']);
$Stock_item_supplier = trim($_POST['supplier']);
$Stock_item_detail = trim($_POST['stock_exp']);
$Stock_supplied_date = trim($_POST['date']);

$sql = "INSERT INTO `stock` (`Stock_item_name`,`Stock_item_detail`, `Stock_item_cat`, `AMOUNT`, `Stock_item_supplier`, `Stock_supplied_date`) VALUES (?, ?,?, ?, ?, CURDATE())";

$statement = $conn->prepare($sql);

// bind parameters
$statement->bind_param("sssds", $Stock_item_name, $Stock_item_detail,$Stock_item_cat, $AMOUNT, $Stock_item_supplier);

$statement->execute();
if($statement == true)
    {
        $_SESSION['success'] = 'supplier added successfully';
        //redirect to item home
        header('location: ../stock.php');
    }
    else
    {
        $_SESSION['error'] = 'Something went wrong while adding supplier department';
        //redirect to item home
        header('location: ../stock.php');
    }


$statement->close();
$conn->close();