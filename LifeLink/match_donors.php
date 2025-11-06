<?php include('connection.php'); ?>
#edited
<!DOCTYPE html>
<html>
<head>
  <title>Find Matching Donors</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2>Find Matching Donors</h2>
  <form method="POST" class="mb-4">
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
      <label>Preferred Location</label>
      <input type="text" name="location" class="form-control" placeholder="Enter city/area" required>
    </div>
    <button type="submit" name="find" class="btn btn-success">Find Donors</button>
  </form>

<?php
if (isset($_POST['find'])) {
    $blood = $_POST['blood_type'];
    $loc = $_POST['location'];

    $sql = "SELECT * FROM donors 
            WHERE blood_type='$blood' 
            AND location LIKE '%$loc%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <tr>
                  <th>Name</th>
                  <th>Blood Type</th>
                  <th>Contact</th>
                  <th>Location</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['blood_type']."</td>
                    <td>".$row['contact']."</td>
                    <td>".$row['location']."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='alert alert-warning'>No matching donors found.</div>";
    }
}
?>
</div>
</body>
</html>
