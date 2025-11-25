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

?>



