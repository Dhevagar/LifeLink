<?php
include('connection.php');

if (!isset($_GET['request_id'])) {
    header("Location: admin.php");
    exit();
}

$request_id = intval($_GET['request_id']);

$request_stmt = $conn->prepare("SELECT blood_type FROM requests WHERE request_id = ?");
$request_stmt->bind_param("i", $request_id);
$request_stmt->execute();
$request_result = $request_stmt->get_result();

if ($request_result->num_rows == 0) {
    die("Invalid Request ID");
}

$request = $request_result->fetch_assoc();
$recipient_blood = $request['blood_type'];

$compatible = [];

switch ($recipient_blood) {
    case 'A+': $compatible = ['A+', 'A-', 'O+', 'O-']; break;
    case 'A-': $compatible = ['A-', 'O-']; break;
    case 'B+': $compatible = ['B+', 'B-', 'O+', 'O-']; break;
    case 'B-': $compatible = ['B-', 'O-']; break;
    case 'AB+': $compatible = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']; break;
    case 'AB-': $compatible = ['AB-', 'A-', 'B-', 'O-']; break;
    case 'O+': $compatible = ['O+', 'O-']; break;
    case 'O-': $compatible = ['O-']; break;
}

$compatible_list = "'" . implode("','", $compatible) . "'";

$donor_stmt = $conn->prepare("
    SELECT donor_id, full_name, blood_type 
    FROM donor 
    WHERE blood_type IN ($compatible_list)
    ORDER BY full_name ASC
");
$donor_stmt->execute();
$donors = $donor_stmt->get_result();

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
    <h5 class="mb-3">Recipient Blood Type: <span class="text-primary"><?php echo $recipient_blood; ?></span></h5>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Select Compatible Donor</label>
            <select name="donor_id" class="form-select" required>
                <option value="">-- Select Donor --</option>

                <?php if ($donors->num_rows == 0): ?>
                    <option disabled>No compatible donors available</option>
                <?php else: ?>
                    <?php while ($donor = $donors->fetch_assoc()): ?>
                        <option value="<?php echo $donor['donor_id']; ?>">
                            <?php echo $donor['full_name']; ?> (<?php echo $donor['blood_type']; ?>)
                        </option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Assign Donor</button>
        <a href="admin.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
