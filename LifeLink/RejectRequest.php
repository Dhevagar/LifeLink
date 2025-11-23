<?php
include('connection.php');

if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];
    $stmt = $conn->prepare("UPDATE requests SET request_status='Rejected' WHERE request_id=?");
    $stmt->bind_param("i", $request_id);
    $stmt->execute();
}

header("Location: admin.php");
exit();
?>
