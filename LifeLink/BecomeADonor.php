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

  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('donorForm');
    const overlay = document.getElementById('popupOverlay');
    const titleEl = document.getElementById('popupTitle');
    const msgEl = document.getElementById('popupMessage');
    const okBtn = document.getElementById('popupOk');
    const closeBtn = document.getElementById('popupClose');

    function showPopup(success, message) {
      titleEl.textContent = success ? 'Registration Successful' : 'Registration Failed';
      titleEl.style.color = success ? '#27ae60' : '#e74c3c';
      msgEl.textContent = message;
      overlay.classList.add('show');
      overlay.setAttribute('aria-hidden', 'false');
      document.documentElement.style.overflow = 'hidden';
      document.body.style.overflow = 'hidden';
    }

    function hidePopup() {
      overlay.classList.remove('show');
      overlay.setAttribute('aria-hidden', 'true');
      document.documentElement.style.overflow = '';
      document.body.style.overflow = '';
    }

    okBtn.addEventListener('click', hidePopup);
    closeBtn.addEventListener('click', hidePopup);

    form.addEventListener('submit', async function (e) {
      e.preventDefault();

      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }

      const submitBtn = form.querySelector('button[type="submit"]');
      if (submitBtn) submitBtn.disabled = true;

      const data = new FormData(form);

      try {
        const resp = await fetch('RegisterDonor.php', {
          method: 'POST',
          body: data
        });
        const json = await resp.json();
        showPopup(json.success, json.message);
        // ✅ Automatically refresh the form after success
        if (json.success) {
        const popup = document.createElement('div');
        popup.innerHTML = `
          <div id="popup-overlay" style="
              position: fixed;
              top: 0; left: 0;
              width: 100%; height: 100%;
              background: rgba(0, 0, 0, 0.6);
              display: flex; justify-content: center; align-items: center;
              z-index: 9999;">
            <div style="
                background: rgba(255, 255, 255, 0.95);
                padding: 30px 40px;
                border-radius: 15px;
                box-shadow: 0 0 20px rgba(52, 152, 219, 0.4);
                text-align: center;
                font-family: 'Poppins', sans-serif;">
              <h2 style="color: #3498db; margin-bottom: 10px;">Registration Successful!</h2>
              <p style="margin-bottom: 20px; color: #333;">We will notify you when your blood type matches.</p>
              <button id="okButton" style="
                  background-color: #3498db;
                  color: white;
                  border: none;
                  border-radius: 10px;
                  padding: 10px 25px;
                  font-size: 16px;
                  cursor: pointer;
                  transition: background 0.3s;">
                OK
              </button>
            </div>
          </div>
        `;
        document.body.appendChild(popup);

        // When OK is clicked, close popup and refresh form
        document.getElementById('okButton').addEventListener('click', () => {
          popup.remove();
          window.location.reload();
        });
      }


      } catch (err) {
        console.error(err);
        showPopup(false, 'Network or server error. Please try again.');
      } finally {
        if (submitBtn) submitBtn.disabled = false;
      }
    });
  });
  </script>


</head>
</body>
</html>

