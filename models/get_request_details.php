<?php
include_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_id = $_POST['req_id'];

    // Fetch details based on the selected request ID
    $sql = "SELECT req_amount as amount, req_dept as department FROM request WHERE req_id = $req_id";
    $result = $conn->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        // Return details in JSON format
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Unable to retrieve details']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
