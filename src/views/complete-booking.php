<?php
require __DIR__ . '/../../config/config.php';

use Src\Models\Countries;

session_start();
$countries = Countries::all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complete Your Booking</title>
  <link rel="stylesheet" href="../../assets/css/complete-booking.css">
</head>

<body>
  <header class="header">
    <div class="container">
      <h1>Complete Your Booking</h1>
    </div>
  </header>

  <main class="main-content">
    <div class="booking-details">
      <h3>Passenger Information</h3>
      <form id="passengerForm" action="../controllers/complete-booking.php" method="POST">
        <div class="form-section">
          <h4>Who's Traveling?</h4>
          <?php

          $numberOfPassengers = $_SESSION['adults']; // Get the number of passengers

          for ($i = 1; $i <= $numberOfPassengers; $i++) {
            echo "
    <h5>Passenger $i</h5>
    <input type='text' id='first-name-$i' name='first_name_$i' placeholder='Enter first name' required>
    <input type='text' id='last-name-$i' name='last_name_$i' placeholder='Enter last name' required>

    <select id='gender-$i' name='gender_$i' required>
        <option value='' disabled selected>Select Gender</option>
        <option value='male'>Male</option>
        <option value='female'>Female</option>
    </select>

    <input type='date' id='dob-$i' name='dob_$i' required>

    <select id='country-$i' name='country_$i' required>
        <option value='' disabled selected>Enter Nationality</option>";
            foreach ($countries as $country) {
              echo "<option >" . $country['name'] . "</option>";
            }
            echo "
    </select>
    
    <input type='text' id='id-number-$i' name='id_number_$i' placeholder='Passport ID' required>";
          }
          ?>



          <div class="form-section">
            <h4>Contact Details</h4>
            <input type="text" id="contact-name" placeholder="Enter contact name" required>
            <input type="email" id="email" placeholder="Enter email" required>
            <div class="phone-input">
              <select id="country-code" required>
                <?php
                foreach ($countries as $country) {
                  echo "<option value='" . $country['phone_prefix'] . "'>" . $country['name'] . " (" . $country['phone_prefix'] . ")</option>";
                }
                ?>
              </select>

              <input type="tel" id="phone" placeholder="Enter phone number" required>
              <input type="text" id="custom-code" placeholder="Enter country code" style="display:none;" />
            </div>
          </div>

          <button type="submit" class="submit-btn">Complete Booking</button>
      </form>
    </div>
  </main>

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-item">
        <img src="../image/airplane-and-airport-tower.png" alt="Airplane Icon" class="footer-icon">
        <p>Fleet of <strong>61 aircraft</strong></p>
      </div>
      <div class="footer-item">
        <img src="../image/airplane-flight-in-circle-around-earth.png" alt="Flight Icon" class="footer-icon">
        <p>1500 <strong>weekly flights</strong></p>
      </div>
      <div class="footer-item">
        <img src="../image/pin.png" alt="Destination Icon" class="footer-icon">
        <p>Over <strong>70 destinations</strong></p>
      </div>
      <div class="footer-item">
        <img src="../image/persons-in-an-airport.png" alt="Traveler Icon" class="footer-icon">
        <p>More than <strong>78 million travelers</strong></p>
      </div>
    </div>

    <div class="footer-links">
      <div class="footer-section">
        <h3>Contact Us</h3>
        <ul>
          <li><a href="customer-support.html" class="footer-link" target="_blank">Customer Support</a></li>
          <li><a href="service-guarantee.html" class="footer-link" target="_blank">Service Guarantee</a></li>
          <li><a href="more-info.html" class="footer-link" target="_blank">More Service Info</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>About</h3>
        <ul>
          <li><a href="about.html" class="footer-link" target="_blank">About</a></li>
          <li><a href="careers.html" class="footer-link" target="_blank">Careers</a></li>
          <li><a href="privacy-policy.html" class="footer-link" target="_blank">Privacy Statement</a></li>
          <li><a href="terms.html" class="footer-link" target="_blank">Terms & Conditions</a></li>
        </ul>
      </div>
    </div>

    <div class="social-links">
      <a href="#" target="_blank"><img src="../image/facebook.png" alt="Facebook"></a>
      <a href="#" target="_blank"><img src="../image/twitter.png" alt="Twitter"></a>
      <a href="#" target="_blank"><img src="../image/instagram.png" alt="Instagram"></a>
      <a href="#" target="_blank"><img src="../image/youtube.png" alt="YouTube"></a>
    </div>
  </footer>

  <script src="../javaScript/complete-booking.js"></script>
</body>

</html>