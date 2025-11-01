<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="../../assets/css/signup.css">
</head>

<body>
  <?php include('./nav-bar.php'); ?>

  <main class="main-content">
    <div class="login-container">
      <form id="signupForm" action="../controllers/signup.php" method="POST">
        <h3>Create an Account</h3>

        <div class="form-group">
          <input type="text" id="fullname" class="search-input" placeholder="Enter your full name" required name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">
        </div>

        <div class="form-group">
          <input type="email" id="email" class="search-input" placeholder="Enter your email" required name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
        </div>

        <div class="form-group">
          <input type="password" id="password" class="search-input" placeholder="Enter your password" required name="password">
        </div>

        <div class="form-group">
          <input type="password" id="confirmPassword" class="search-input" placeholder="Confirm your password" required name="confirmPassword">
        </div>

        <input type="submit" class="search-btn" name="submit" value="Sign Up">
        <div id="error-messages"></div>
        <?php
        // Check if there's any error message and display it in the specific section
        if (isset($_SESSION['error'])) {
          echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
          unset($_SESSION['error']);
        }



        ?>
        <p class="signup-prompt">Already have an account? <a href="sign-in.html" style="color: #005c97; text-decoration: none;">Sign in here</a></p>
      </form>
    </div>
  </main>

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-item">
        <img src="../../assets/images/airplane-and-airport-tower.png" alt="Airplane Icon" class="footer-icon">
        <p>Fleet of <strong>61 aircraft</strong></p>
      </div>
      <div class="footer-item">
        <img src="../../assets/images/airplane-flight-in-circle-around-earth.png" alt="Flight Icon" class="footer-icon">
        <p>1500 <strong>weekly flights</strong></p>
      </div>
      <div class="footer-item">
        <img src="../../assets/images/pin.png" alt="Destination Icon" class="footer-icon">
        <p>Over <strong>70 destinations</strong></p>
      </div>
      <div class="footer-item">
        <img src="../../assets/images/persons-in-an-airport.png" alt="Traveler Icon" class="footer-icon">
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
      <a href="#" target="_blank"><img src="../../assets/images/facebook.png" alt="Facebook"></a>
      <a href="#" target="_blank"><img src="../../assets/images/twitter.png" alt="Twitter"></a>
      <a href="#" target="_blank"><img src="../../assets/images/instagram.png" alt="Instagram"></a>
      <a href="#" target="_blank"><img src="../../assets/images/youtube.png" alt="YouTube"></a>
    </div>
  </footer>

  <script src="../../assets/js/signup.js"></script>

</body>

</html>