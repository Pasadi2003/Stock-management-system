<?php
require_once '../bootstrap.php';
require_once '../bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $req_id = $_POST['req_id'];
    $req_item = trim($_POST['req_item']);
    $req_amount = trim($_POST['req_amount']);
    $req_dept = trim($_POST['req_dept']);
    $req_status = trim($_POST['req_status']);
    $req_item_cat = trim($_POST['req_item_cat']);
    $req_item_exp = trim($_POST['req_item_exp']);
    $req_dept_id = trim($_POST['req_dept_id']);

    require_once '../db.php';

    $conn->begin_transaction();

    try {
        // Update data in the request table
        $sqlUpdateRequest = "UPDATE `request` SET 
                            `req_item` = ?, 
                            `req_amount` = ?, 
                            `req_dept` = ?, 
                            `req_status` = ?, 
                            `req_item_cat` = ?, 
                            `req_item_exp` = ?, 
                            `req_dept_id` = ? 
                            WHERE `req_id` = ?";
        $statementUpdateRequest = $conn->prepare($sqlUpdateRequest);
        $statementUpdateRequest->bind_param("sdssssii", $req_item, $req_amount, $req_dept, $req_status, $req_item_cat, $req_item_exp, $req_dept_id, $req_id);
        $statementUpdateRequest->execute();
        $statementUpdateRequest->close();



        $sqlUpdateStock = "UPDATE stock SET stock.Amount = stock.Amount-$req_amount WHERE stock.stockFK IN (SELECT request.req_id FROM request WHERE request.req_id = $req_id);";        
        $statementUpdateStock = $conn->prepare($sqlUpdateStock);
        //$statementUpdateStock->bind_param("ii", $req_amount, $req_id);
        $statementUpdateStock->execute();
        $statementUpdateStock->close();

        // Insert data into the item table
$sqlItem = "INSERT INTO `item` (`item_name`, `Amount`, `item_cat`, `item_detail`, `req_dept_id`) VALUES (?, ?, ?, ?, ?)";
$statementItem = $conn->prepare($sqlItem);
$statementItem->bind_param("sdssi", $req_item, $req_amount, $req_item_cat, $req_item_exp, $req_dept_id);
$statementItem->execute();
$statementItem->close();



        $conn->commit();

        $_SESSION['success'] = 'Request updated successfully';
        header('location: ../allocate.php');
    } catch (Exception $e) {
        $conn->rollback();

        $_SESSION['error'] = 'Something went wrong while updating request';
        header('location: ../allocate.php');
    }
} else {
    $_SESSION['error'] = 'Invalid request';
    header('location: ../allocate.php');
}
