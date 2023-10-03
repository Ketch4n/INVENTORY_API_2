<?php
include '../db/database.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$id = $_POST['id'];

// Delete the stock data
$sql_stock = "DELETE FROM users WHERE id = '$id'";


// Perform the stock deletion
if ($con->query($sql_stock) === TRUE) {
    echo "user deleted successfully. ";
    
  
} else {
    echo "Error deleting user: " . $con->error;
}
header('Content-Type: application/json');
$conn->close();
?>
