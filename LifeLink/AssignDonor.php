<?php
include('connection.php');

if (!isset($_GET['request_id'])) {
    header("Location: admin.php");
    exit();
}
$donor_stmt = $conn->prepare("SELECT donor_id, full_name, blood_type FROM donor ORDER BY full_name ASC");
$donor_stmt->execute();

$request_id = intval($_GET['request_id']);
$donor_list = $donor_stmt->get_result();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donor_id = intval($_POST['donor_id']);

    $update = $conn->prepare("UPDATE requests SET assigned_donor_id=? WHERE request_id=?");
    $update->bind_param("ii", $donor_id, $request_id);
    $update->execute();

    header("Location: admin.php");
    exit();
}
?>




