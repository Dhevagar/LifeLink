<?php
include('connection.php');


if (isset($_GET['donor_id'])) {
    $donor_id = $_GET['donor_id'];

}

header("Location: admin.php");
exit();
?>
