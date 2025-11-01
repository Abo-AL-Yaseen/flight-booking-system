<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Confirmation</title>
  <link rel="stylesheet" href="../../assets/css/confirmation-page.css">
</head>

<body>
  <header class="header">
    <div class="container">
      <h1>Booking Confirmation</h1>
    </div>
  </header>

  <main class="main-content">
    <div class="confirmation-details">
      <h3>Flight Details</h3>

      <div style="display: flex; gap:250px;">
        <ul>
          <li><strong>From:</strong> <span id="departure"><?php echo $_SESSION['leaving_from']; ?></span></li>
          <li><strong>To:</strong> <span id="destination"><?php echo $_SESSION['going_to']; ?></span></li>
          <li><strong> Leaving Date:</strong> <span id="flight-date"><?php echo $_SESSION['departure_time1']; ?></span></li>
          <li><strong> Arriving Date:</strong> <span id="flight-date"><?php echo $_SESSION['arrival_time1']; ?></span></li>
          <li><strong>Passengers:</strong> <span id="passenger-count"><?php echo $_SESSION['adults']; ?></span></li>
          <li><strong>Base Price:</strong> $ <?php echo $_SESSION['price']; ?></li>
        </ul>
        <ul>
          <li><strong>From:</strong> <span id="departure"><?php echo $_SESSION['going_to']; ?></span></li>
          <li><strong>To:</strong> <span id="destination"><?php echo $_SESSION['leaving_from']; ?></span></li>
          <li><strong> Leaving Date:</strong> <span id="flight-date"><?php echo $_SESSION['departure_time2']; ?></span></li>
          <li><strong> Arriving Date:</strong> <span id="flight-date"><?php echo $_SESSION['arrival_time2']; ?></span></li>
          <li><strong>Passengers:</strong> <span id="passenger-count"><?php echo $_SESSION['adults']; ?></span></li>
        </ul>
      </div>
      <strong>Base Price:</strong> $ <?php echo $_SESSION['price']; ?>

      <h3>Add-ons</h3>
      <form id="addonsForm">
        <label>
          <input type="checkbox" class="addon" data-price="50" id="extra-baggage">
          Extra Baggage (10kg) - $ 50
        </label>
        <label>
          <input type="checkbox" class="addon" data-price="100" id="window-seat">
          Window Seat - $ 100
        </label>
        <label>
          <input type="checkbox" class="addon" data-price="30" id="special-meal">
          Special Meal - $ 30
        </label>
        <p><strong>Total Price:</strong> $ <span id="total-price">1000</span></p>
      </form>

      <h3>Payment</h3>
      <form id="paymentForm">
        <label for="payment-method">Select Payment Method:</label>
        <select id="payment-method" required>
          <option value="" disabled selected>Select Method</option>
          <option value="credit-card">Credit Card</option>
          <option value="paypal">PayPal</option>
          <option value="cash">Cash at Company Office</option>
        </select>


        <div id="credit-card-fields" class="payment-fields" style="display: none;">
          <label for="card-number">Card Number:</label>
          <input type="text" id="card-number" placeholder="Enter card number">

          <label for="expiry-date">Expiry Date:</label>
          <input type="text" id="expiry-date" placeholder="MM/YY">

          <label for="cvv">CVV:</label>
          <input type="text" id="cvv" placeholder="Enter CVV">
        </div>


        <div id="paypal-fields" class="payment-fields" style="display: none;">
          <label for="paypal-email">PayPal Email:</label>
          <input type="email" id="paypal-email" placeholder="Enter your PayPal email">
        </div>


        <div id="cash-fields" class="payment-fields" style="display: none;">
          <p>Please visit our nearest office to complete the payment:</p>
          <p><strong>Office Address:</strong> Al-Irsal Street, Palestine Tower,5th Floor
            <br> Ramallah City, West Bank
            <br>Palestine
          </p>
        </div>

        <button type="submit" class="submit-btn">Pay Now</button>
      </form>

    </div>
  </main>


  <div id="success-message" style="display: none;" class="success-message">
    <p>Your booking has been successfully confirmed!</p>
    <button id="close-button" class="close-btn">Thank You and Close</button>
  </div>



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

  <script src="../javaScript/confirmation-page.js"></script>
</body>

</html>