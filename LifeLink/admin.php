<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

include('connection.php');
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
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $stmt = $conn->prepare("SELECT donor_id, full_name, blood_type, address, phone, email, status FROM donor ORDER BY donor_id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                if ($row['status'] === 'Donated') {
                    $statusBadge = "<span class='badge bg-success'>Donated</span>";
                    $toggleBtn = "
                        <a href='ToggleDonorStatus.php?donor_id=" . urlencode($row['donor_id']) . "&status=Undonated' 
                           class='btn btn-sm btn-danger action-btn'>Mark Undonated</a>
                    ";
                } else {
                    $statusBadge = "<span class='badge bg-secondary'>Undonated</span>";
                    $toggleBtn = "
                        <a href='ToggleDonorStatus.php?donor_id=" . urlencode($row['donor_id']) . "&status=Donated' 
                           class='btn btn-sm btn-primary action-btn'>Mark Donated</a>
                    ";
                }

                echo "<tr>
                        <td>" . htmlspecialchars($row['donor_id']) . "</td>
                        <td>" . htmlspecialchars($row['full_name']) . "</td>
                        <td>" . htmlspecialchars($row['blood_type']) . "</td>
                        <td>" . htmlspecialchars($row['address']) . "</td>
                        <td>" . htmlspecialchars($row['phone']) . "</td>
                        <td>" . htmlspecialchars($row['email']) . "</td>
                        <td>$statusBadge</td>
                        <td>
                            $toggleBtn
                            <a href='DeleteDonor.php?donor_id=" . urlencode($row['donor_id']) . "'
                               class='btn btn-danger btn-sm'
                               onclick='return confirm(\"Delete this donor?\");'>
                               Delete
                            </a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='text-center'>No donors found</td></tr>";
        }
        ?>
        </tbody>
    </table>


    <h2>Blood Requests</h2>
    <table class="table table-bordered table-striped table-responsive">
        <thead class="table-danger">
            <tr>
                <th>Request ID</th>
                <th>Blood Type</th>
                <th>Healthcare Name</th>
                <th>Status</th>
                <th>Assigned Donor ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $stmt_requests = $conn->prepare(
            "SELECT 
                request_id, 
                blood_type, 
                healthcare_name, 
                urgency_level, 
                status, 
                assigned_donor_id 
            FROM requests 
            ORDER BY request_id DESC"
        );
        $stmt_requests->execute();
        $result_requests = $stmt_requests->get_result();

        if ($result_requests->num_rows > 0) {
            while ($row = $result_requests->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['request_id']) . "</td>
                        <td>" . htmlspecialchars($row['blood_type']) . "</td>
                        <td>" . htmlspecialchars($row['healthcare_name']) . "</td>
                        <td>" . htmlspecialchars($row['urgency_level']) . "</td>
                        <td>" . htmlspecialchars($row['status']) . "</td>
                        <td>" . ($row['assigned_donor_id'] ? htmlspecialchars($row['assigned_donor_id']) : 'Not Assigned') . "</td>
                        <td>
                            <a href='AssignDonor.php?request_id=" . urlencode($row['request_id']) . "' class='btn btn-sm btn-primary action-btn'>Assign</a>

                            <a href='ToggleRequestStatus.php?request_id=" . urlencode($row['request_id']) . "&status=" . ($row['request_status'] === "Completed" ? "Pending" : "Completed") . "' 
                            class='btn btn-sm " . ($row['request_status'] === "Completed" ? "btn-danger" : "btn-success") . " action-btn'>
                            " . ($row['request_status'] === "Completed" ? "Undo Complete" : "Complete") . "
                            </a>

                            <a href='DeleteRequest.php?request_id=" . urlencode($row['request_id']) . "' 
                               class='btn btn-sm btn-danger action-btn' 
                               onclick='return confirm(\"Are you sure?\");'>Delete</a>
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
$stmt->close();
$conn->close();
?>
</body>
</html>
