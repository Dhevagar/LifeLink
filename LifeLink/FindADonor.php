<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find a Donor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
  <nav class="navbar">
    <div class="nav-container">
      <a href="index.html" class="logo">
        <img src="LifeLinkLogo.png" alt="LifeLink Logo">
      </a>
      <ul class="nav-links">
        <li><a href="index.html">Homepage</a></li>
        <li><a href="BecomeADonor.php">Become a Donor</a></li>
        <li><a href="FindADonor.php" class="active">Find a Donor</a></li>
      </ul>
    </div>
  </nav>

  <div class="form-container">
    <h2>Request a Donor</h2>
    <form action="FindADonor.php" method="POST">
      <div class="mb-3">
        <label class="form-label">Requester ID</label>
        <input type="text" name="requester_id" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Blood Type</label>
        <select name="blood_type" class="form-select" required>
          <option value="">Select Blood Type</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Healthcare Name</label>
        <select name="healthcare_name" class="form-select" required>
          <option value="">Select Hospital</option>
          <option value="Sunway Medical Centre Penang">Sunway Medical Centre Penang</option>
          <option value="Island Hospital">Island Hospital</option>
          <option value="Penang Adventist Hospital">Penang Adventist Hospital</option>
          <option value="Pantai Hospital Penang">Pantai Hospital Penang</option>
          <option value="Hospital Pulau Pinang">Hospital Pulau Pinang</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Urgency Level</label>
        <select name="urgency_level" class="form-select" required>
          <option value="">Select Urgency</option>
          <option value="Low">Low</option>
          <option value="Moderate">Moderate</option>
          <option value="High">High</option>
          <option value="Critical">Critical</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
          <option value="">Select Status</option>
          <option value="Pending">Pending</option>
          <option value="Approved">Approved</option>
          <option value="Completed">Completed</option>
        </select>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary w-100 py-2">Submit Request</button>
      </div>
    </form>
  </div>
</body>

</html>

