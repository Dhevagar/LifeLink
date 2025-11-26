<?php
include('connection.php');

if (isset($_GET['request_id']) && isset($_GET['status'])) {
    $request_id = $_GET['request_id'];
    $new_status = $_GET['status']; // "Completed" OR "Pending"

    $stmt = $conn->prepare("UPDATE requests SET status = ? WHERE request_id = ?");
    $stmt->bind_param("si", $new_status, $request_id);

    if ($stmt->execute()) {
        header("Location: admin.php?msg=request_updated");
        exit();
    } else {
        echo "Failed to update request.";
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
