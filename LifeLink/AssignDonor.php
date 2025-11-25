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
?>
<!DOCTYPE html>
<html>
<head>
    <title>Assign Donor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-danger">Assign Donor to Request #<?php echo $request_id; ?></h2>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Choose a Donor</label>
            <select class="form-select" name="donor_id" required>
                <option value="">-- Select Donor --</option>
                <?php while ($d = $donor_list->fetch_assoc()): ?>
                    <option value="<?php echo $d['donor_id']; ?>">
                        <?php echo $d['full_name']; ?> (<?php echo $d['blood_type']; ?>)
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
    header("Location: admin.php");
    exit();
}
?>





