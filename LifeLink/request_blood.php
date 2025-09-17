<?php include('connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Request Blood - LifeLink</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2 class="text-danger mb-4">Request Blood</h2>

  <form method="POST">
    <div class="mb-3">
      <label>Patient / Hospital Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Required Blood Type</label>
      <select name="blood_type" class="form-control" required>
        <option value="A+">A+</option><option value="A-">A-</option>
        <option value="B+">B+</option><option value="B-">B-</option>
        <option value="AB+">AB+</option><option value="AB-">AB-</option>
        <option value="O+">O+</option><option value="O-">O-</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Location</label>
      <input type="text" name="location" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Contact Number</label>
      <input type="text" name="contact" class="form-control" required>
    </div>

    <button type="submit" name="request" class="btn btn-danger">Submit Request</button>
  </form>

<?php
if (isset($_POST['request'])) {
    $name = $_POST['name'];
    $blood_type = $_POST['blood_type'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO requests (name, blood_type, location, contact) 
            VALUES ('$name', '$blood_type', '$location', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success mt-3'>
                Blood request submitted successfully!
              </div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>
                Error: " . $conn->error . "
              </div>";
    }
}
?>
</div>

</body>
</html>
