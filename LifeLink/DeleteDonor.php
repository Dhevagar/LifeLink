<?php
include 'connection.php';

if (!isset($_GET['donor_id'])) {
    echo "<script>alert('Invalid donor ID'); window.location.href='admin.php';</script>";
    exit;
}

$donor_id = $_GET['donor_id'];

$sql = "DELETE FROM donor WHERE donor_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $donor_id);

if ($stmt->execute()) {
    echo "<script>alert('Donor deleted successfully'); window.location.href='admin.php';</script>";
} else {
    echo "<script>alert('Error deleting donor'); window.location.href='admin.php';</script>";
}

$stmt->close();
$conn->close();
?>
