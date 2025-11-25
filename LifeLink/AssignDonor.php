<?php
include('connection.php');

if (!isset($_GET['request_id'])) {
    header("Location: admin.php");
    exit();
}

$request_id = intval($_GET['request_id']);

?>


