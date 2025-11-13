<?php
include('connection.php');
// Ensure admin is logged in
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard - LifeLink</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<!-- this is only testing-->
<div class="container mt-5">
  <h2 class="text-danger mb-4">Admin Dashboard</h2>

  <!-- Donors Table -->
  <h4 class="mb-3">Registered Donors</h4>
  <table class="table table-bordered table-striped">
    <thead class="table-danger">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Blood Type</th>
        <th>Location</th>
        <th>Contact</th>
        <th>Registration Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $result = $conn->query("SELECT * FROM donors");
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['blood_type']}</td>
              <td>{$row['location']}</td>
              <td>{$row['contact']}</td>
              <td>{$row['register_date']}</td>
            </tr>";
          }
        } else {
          echo "<tr><td colspan='6' class='text-center'>No donors found</td></tr>";
        }
      ?>
    </tbody>
  </table>

  <!-- Requests Table -->
  <h4 class="mt-5 mb-3">Blood Requests</h4>
  <table class="table table-bordered table-striped">
    <thead class="table-danger">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Blood Type</th>
        <th>Location</th>
        <th>Contact</th>
        <th>Request Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $result = $conn->query("SELECT * FROM requests");
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
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
