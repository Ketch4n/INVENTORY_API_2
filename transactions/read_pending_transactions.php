<?php
include '../db/database.php'; // Include your database connection
header('Content-Type: application/json');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}



// Prepare and execute the query with a JOIN operation
$query = "SELECT * FROM orders WHERE status = 'pending' ORDER BY date ASC";

$result = $con->query($query);

if (!$result) {
    die("Query failed: " . $con->error);
}

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    echo json_encode($data);
} else {
    echo json_encode(array());
}

$con->close();
?>
