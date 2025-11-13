<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LifeLink - Become a Donor</title>
  <link rel="stylesheet" href="style.css">
<body>

 <nav class="navbar">
    <div class="nav-container">
        <a href="index.html" class="logo">
        <img src="LifeLinkLogo.png" alt="LifeLink Logo">
        </a>
        <ul class="nav-links">
        <li><a href="index.html">Homepage</a></li>
        <li><a href="BecomeADonor.php" class="active">Become a Donor</a></li>
        <li><a href="FindADonor.php">Find a Donor</a></li>
        </ul>
    </div>
 </nav>

 <section style="text-align: center; padding: 80px 20px; background: #fff;">
    <h2 style="color: #d62828; font-size: 2.2rem; margin-bottom: 20px;">Why Donate Blood?</h2>
    <p style="max-width: 800px; margin: auto; font-size: 1.1rem;">
      Every donation is a lifeline for patients in need. Whether it’s accident victims, surgery patients, 
      or those battling chronic illness. Your contribution ensures that no life is lost due to blood shortages.
    </p>
    <div style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap; margin-top: 40px;">
      <div style="max-width: 250px;">
        <h3>💉 Save Lives</h3>
        <p>Your one donation can help multiple people in critical need.</p>
      </div>
      <div style="max-width: 250px;">
        <h3>❤️ Build Community</h3>
        <p>Be part of a caring network that supports those in need.</p>
      </div>
      <div style="max-width: 250px;">
        <h3>🌎 Make an Impact</h3>
        <p>A few minutes of your time can make a world of difference.</p>
      </div>
    </div>
  </section>

  <section style="background: #fdf3f3; padding: 60px 20px;">
    <div style="max-width: 800px; margin: auto; text-align: center;">
      <h2 style="color: #d62828; font-size: 2rem; margin-bottom: 20px;">Eligibility to Donate</h2>
      <ul style="list-style: none; text-align: left; font-size: 1.1rem; margin-top: 20px;">
        <li>✔️ Aged between 18 and 60 years old</li>
        <li>✔️ Weigh at least 45kg</li>
        <li>✔️ In good general health</li>
        <li>✔️ No recent infections or illnesses</li>
        <li>✔️ Haven’t donated in the last 3 months</li>
      </ul>
    </div>
  </section>

  <section id="donor-form" style="padding: 80px 20px; text-align: center;">
    <h2 style="color: #d62828; font-size: 2rem; margin-bottom: 20px;">Register as a Donor</h2>
    <form id="donorForm" class="donor-form">
      <label>Name:</label>
      <input type="text" name="full_name" required>

      <label>Blood Type:</label>
      <select name="blood_type" required>
        <option value="">-</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
      </select>

      <label>Location:</label>
      <select name="address" required>
        <option value="">-</option>
        <option value="Sunway Medical Centre Penang">Sunway Medical Centre Penang</option>
        <option value="Island Hospital">Island Hospital</option>
        <option value="Penang Adventist Hospital">Penang Adventist Hospital</option>
        <option value="Pantai Hospital Penang">Pantai Hospital Penang</option>
        <option value="Hospital Pulau Pinang">Hospital Pulau Pinang</option>
      </select>

      <label>Contact Number:</label>
      <input type="text" name="phone" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <button type="submit" class="btn-gradient">Submit Registration</button>
    </form>

    <p style="margin-top: 20px; font-size: 0.9rem; color: #555;"> 
        Your information is kept private and shared only with patients or hospitals in need.
    </p>

    <div id="popupOverlay" class="popup-overlay" aria-hidden="true">
      <div class="popup" role="dialog" aria-modal="true" aria-labelledby="popupTitle">
        <h2 id="popupTitle">Status</h2>
        <p id="popupMessage">Message</p>
        <div>
          <button id="popupOk" class="btn">OK</button>
          <button id="popupClose" class="btn secondary">Close</button>
        </div>
      </div>
    </div>
  </section>


</head>
</body>
</html>

