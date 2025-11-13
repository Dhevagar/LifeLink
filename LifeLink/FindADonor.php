<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find a Donor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #74ebd5, #acb6e5);
      min-height: 100vh;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

    /* Navbar */
    .navbar {
      background: white;
      padding: 10px 40px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .nav-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 25px;
      margin: 0;
    }

    .nav-links a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
      transition: color 0.3s;
    }

    .nav-links a:hover,
    .nav-links a.active {
      color: #3498db;
    }

    .logo img {
      height: 50px;
    }

    /* Form styling */
    .form-container {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 600px;
      margin: 60px auto;
      padding: 40px;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
      font-weight: 600;
    }

    .btn-primary {
      background-color: #3498db;
      border: none;
      border-radius: 8px;
      transition: background 0.3s;
    }

    .btn-primary:hover {
      background-color: #2c80b4;
    }
  </style>
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

