<?php
include('connection.php');

if (!isset($_GET['request_id'])) {
    header("Location: admin.php");
    exit();
}

$request_id = intval($_GET['request_id']);

// Fetch all donors
$donor_stmt = $conn->prepare("SELECT donor_id, full_name, blood_type FROM donor ORDER BY full_name ASC");
$donor_stmt->execute();
$donors = $donor_stmt->get_result();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['donor_id'])) {
    $donor_id = intval($_POST['donor_id']);

    $update_stmt = $conn->prepare("UPDATE requests SET assigned_donor_id=? WHERE request_id=?");
    $update_stmt->bind_param("ii", $donor_id, $request_id);

    if ($update_stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Failed to assign donor.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign Donor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-danger mb-4">Assign Donor to Request #<?php echo $request_id; ?></h2>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Select Donor</label>
            <select name="donor_id" class="form-select" required>
                <option value="">-- Select Donor --</option>

                <?php while ($donor = $donors->fetch_assoc()): ?>
                    <option value="<?php echo $donor['donor_id']; ?>">
                        <?php echo $donor['full_name']; ?> (<?php echo $donor['blood_type']; ?>)
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Assign Donor</button>
        <a href="admin.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
