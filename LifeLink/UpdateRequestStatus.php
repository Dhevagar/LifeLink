<?php
include 'connection.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = $_GET['status'];

    $allowed_status = ['completed', 'pending', 'cancelled'];

    if (!in_array($status, $allowed_status)) {
        die("Invalid status value.");
    }

$sql = "UPDATE requests SET status = '$status' WHERE request_id = $id";
    
    if ($conn->query($sql) === TRUE) {
       header("Location: admin.php?message=Status updated successfully");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
