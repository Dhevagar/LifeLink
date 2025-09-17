<!DOCTYPE html>
<html>
<head>
  <title>LifeLink - Blood Donation & Emergency System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand" href="#">LifeLink</a>
  </div>
</nav>

<div class="container text-center mt-5">
  <h1 class="mb-3 text-danger">Welcome to LifeLink</h1>
  <p class="lead mb-4">Connecting blood donors with patients and hospitals in need</p>

  <div class="row justify-content-center">
    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Register as Donor</h5>
          <p class="card-text">Join our community and save lives.</p>
          <a href="donor_register.php" class="btn btn-danger">Register</a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Request Blood</h5>
          <p class="card-text">Need blood urgently? Submit a request.</p>
          <a href="request_blood.php" class="btn btn-danger">Request</a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Find Donors</h5>
          <p class="card-text">Search for available donors near you.</p>
          <a href="match_donors.php" class="btn btn-danger">Find</a>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="bg-danger text-white text-center p-3 mt-5">
  &copy; <?php echo date('Y'); ?> LifeLink. All rights reserved.
</footer>

</body>
</html>
