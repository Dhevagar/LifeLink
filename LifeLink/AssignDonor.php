<?php
include('connection.php');

if (isset($_GET['request_id']) && isset($_GET['donor_id'])) {
    $request_id = $_GET['request_id'];
    $donor_id = $_GET['donor_id'];
    $stmt = $conn->prepare("UPDATE requests SET assigned_donor_id=? WHERE request_id=?");
    $stmt->bind_param("ii", $donor_id, $request_id);
    $stmt->execute();
}

header("Location: admin.php");
exit();
?>
