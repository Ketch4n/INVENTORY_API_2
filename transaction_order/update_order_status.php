<?php
include '../db/database.php'; // Include your database connection
header('Content-Type: application/json');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if item_id and new_status are provided via POST request
if (isset($_POST['order_id']) && isset($_POST['status'])) {
    $item_id = $_POST['order_id'];
    $new_status = $_POST['status'];

    // Update the status of the order
    $updateQuery = "UPDATE orders SET status = '$new_status' WHERE id = '$item_id'";
    $updateResult = $con->query($updateQuery);

    if (!$updateResult) {
        die("Update query failed: " . $con->error);
    }

    // Check the number of rows affected by the update
    if ($con->affected_rows > 0) {
        echo json_encode(array('message' => 'Status updated successfully'));
    } else {
        echo json_encode(array('message' => 'No orders were updated'));
    }
} else {
    echo json_encode(array('message' => 'Missing item_id or new_status'));
}

$con->close();
?>
