<?php
include('connection.php');
session_start();

// Ensure admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - LifeLink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table tbody tr:hover { background-color: #ffe6e6; }
        .action-btn { margin-right: 5px; }
    </style>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-danger mb-4">Admin Dashboard</h2>

    <!-- Donors Table -->
    <h4 class="mb-3">Registered Donors</h4>
    <table class="table table-bordered table-striped table-responsive">
        <thead class="table-danger">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Blood Type</th>
            <th>Location</th>
            <th>Contact</th>
            <th>Registration Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $conn->prepare("SELECT id, name, blood_type, location, contact, register_date FROM donors ORDER BY register_date DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>{$row['blood_type']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['contact']}</td>
                        <td>{$row['register_date']}</td>
                        <td>
                            <a href='edit_donor.php?id=" . urlencode($row['id']) . "' class='btn btn-sm btn-primary action-btn'>Edit</a>
                            <a href='delete_donor.php?id=" . urlencode($row['id']) . "' class='btn btn-sm btn-danger action-btn' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>No donors found</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <!-- Requests Table -->
    <h4 class="mt-5 mb-3">Blood Requests</h4>
    <table class="table table-bordered table-striped table-responsive">
        <thead class="table-danger">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Blood Type</th>
            <th>Location</th>
            <th>Contact</th>
            <th>Request Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $conn->prepare("SELECT id, requester_id, blood_type, healthcare_name, urgency_level, status, request_date FROM requests ORDER BY request_date DESC");
        $stmt->execute();
        $result = $stmt->get_result();
         if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>{$row['blood_type']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['contact']}</td>
                        <td>{$row['request_date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center'>No requests found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
