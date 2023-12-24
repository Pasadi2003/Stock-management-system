<?php
// get_requested_items.php

// Assume you have a database connection
include_once('db.php');

$selectedDepartment = $_POST['department'];

$sqlRequestedItems = "SELECT req_item FROM request WHERE req_dept = '$selectedDepartment'";
$resultRequestedItems = $conn->query($sqlRequestedItems);

$options = '';
while ($rowRequestedItem = $resultRequestedItems->fetch_assoc()) {
    $options .= "<option value='" . $rowRequestedItem['req_item'] . "'>" . $rowRequestedItem['req_item'] . "</option>";
}

echo $options;
?>
