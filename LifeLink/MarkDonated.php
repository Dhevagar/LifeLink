<?php
include('connection.php');

if (isset($_GET['donor_id'])) {
    $donor_id = $_GET['donor_id'];
    $stmt = $conn->prepare("UPDATE donor SET status='Donated' WHERE donor_id=?");
    $stmt->bind_param("i", $donor_id);
    $stmt->execute();
}

header("Location: admin.php");
exit();
?>
