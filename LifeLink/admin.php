<?php
include('connection.php');
session_start();

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

    <div class="text-end mb-3">
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>

    <h2 class="text-danger mb-4">Admin Dashboard</h2>

    <h4 class="mb-3">Registered Donors</h4>
    <table class="table table-bordered table-striped table-responsive">
        <thead class="table-danger">
        <tr>
            <th>Donor ID</th>
            <th>Full Name</th>
            <th>Blood Type</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $conn->prepare("SELECT donor_id, full_name, blood_type, address, phone, email, created_at FROM donor ORDER BY created_at DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['full_name']) . "</td>
                        <td>" . htmlspecialchars($row['blood_type']) . "</td>
                        <td>" . htmlspecialchars($row['address']) . "</td>
                        <td>" . htmlspecialchars($row['phone']) . "</td>
                        <td>" . htmlspecialchars($row['email']) . "</td>
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

    <h4 class="mt-5 mb-3">Blood Requests</h4>
    <table class="table table-bordered table-striped table-responsive">
        <thead class="table-danger">
        <tr>
            <th>ID</th>
            <th>Requester ID</th>
            <th>Blood Type</th>
            <th>Healthcare Name</th>
            <th>Urgency Level</th>
            <th>Status</th>
            <th>Request Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query_requests = "SELECT request_id, requester_id, blood_type, healthcare_name, urgency_level, status FROM requests";
        $stmt_requests = $conn->prepare($query_requests);
        $stmt_requests->execute();
        $result_requests = $stmt_requests->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['donor_id']) . "</td>
                        <td>" . htmlspecialchars($row['full_name']) . "</td>
                        <td>" . htmlspecialchars($row['blood_type']) . "</td>
                        <td>" . htmlspecialchars($row['address']) . "</td>
                        <td>" . htmlspecialchars($row['phone']) . "</td>
                        <td>" . htmlspecialchars($row['email']) . "</td>
                        <td>" . htmlspecialchars($row['created_at']) . "</td>
                        <td>
                            <a href='edit_request.php?request_id=" . $row['request_id'] . "'>Edit</a> | 
                            <a href='delete_request.php?request_id=" . $row['request_id'] . "' onclick='return confirm(\"Delete this request?\");'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='text-center'>No requests found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<?php
// Close statement and connection
$stmt->close();
$conn->close();
?>
</body>
</html>
