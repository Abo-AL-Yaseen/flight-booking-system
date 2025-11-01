<?php
require __DIR__ . '/../../config/config.php';

use Src\Models\Place;

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flight Booking</title>
  <link rel="stylesheet" href="../../assets/css/book-flight.css">
</head>

<body>
  <?php include('./nav-bar.php'); ?>

  <main class="main-content">
    <div class="search-bar">
      <form id="flightSearchForm" method="POST" action="../controllers/book-flight.php">
        <input id="leaving-from" type="text" list="locations" name="leaving_from" placeholder="from" value="<?php echo $_SESSION['leaving_from']; ?>">
        <input id="going-to" type="text" list="locations" name="going_to" placeholder=" to" value="<?php echo $_SESSION['going_to']; ?>">
        <datalist id="locations">

          <?php

          $places = Place::all();
          foreach ($places as $place) {
            echo "<option value='{$place->name}'>";
          }
          ?>
        </datalist>
        <!-- <input type="text" placeholder="From (e.g., Barcelona)" class="search-input" value="<?php echo $_SESSION['leaving_from']; ?>">
        <input type="text" placeholder="To (e.g., Istanbul)" class="search-input" value="<?php echo $_SESSION['going_to']; ?>"> -->
        <input type="date" class="search-input" value="<?php echo $_SESSION['departure_date']; ?>" name="departure_date">
        <?php
        if ($_SESSION['trip'] === 'round_trip') {
          echo '<input type="date" class="search-input" value="' . $_SESSION['return_date'] . '" name="return_date">';
        }
        ?>
        <div class="passenger-select">
          <label for="adults">Adults:</label>
          <button type="button" id="decreaseAdults" class="passenger-btn">-</button>
          <input type="number" id="adults" class="search-input" min="1" value="<?php echo $_SESSION['adults']; ?>" name="adults">
          <button type="button" id="increaseAdults" class="passenger-btn">+</button>


        </div>
        <input type="submit" class="search-btn" value="Search" name="search">
      </form>
    </div>
    <img src="" alt="">
    <div class="results">
      <h3>Available Flights</h3>
      <?php
      require_once '../../config/row-sql-config.php';

      $sql = "SELECT flight.id,
             flight.price, 
             airline.photo,
             place_to.name AS \"to\", 
             place_from.name AS \"from\", 
             airline.name AS \"airline\",
             flight.departure_time,
             flight.arrival_time
        FROM flight
        INNER JOIN place AS place_to ON flight.to = place_to.id and place_to.name = '{$_SESSION['going_to']}'
        INNER JOIN place AS place_from ON flight.from = place_from.id and place_from.name = '{$_SESSION['leaving_from']}'
        INNER JOIN airline ON airline.id = flight.airline and Date(flight.departure_time) = '{$_SESSION['departure_date']}'";
      $oneWayFlights = makeQuery($sql);

      if ($_SESSION['trip'] === 'round_trip') {
        $sql = "SELECT flight.id,
                    flight.price, 
                    airline.photo,
                    place_to.name AS \"to\", 
                    place_from.name AS \"from\", 
                    airline.name AS \"airline\",
                    flight.departure_time,
                    flight.arrival_time
              FROM flight
              INNER JOIN place AS place_to ON flight.to = place_to.id and place_to.name = '{$_SESSION['leaving_from']}'
              INNER JOIN place AS place_from ON flight.from = place_from.id and place_from.name = '{$_SESSION['going_to']}'
              INNER JOIN airline ON airline.id = flight.airline and Date(flight.departure_time) = '{$_SESSION['return_date']}'";
        $returnFlights = makeQuery($sql);

        foreach ($returnFlights as $flight2) {
          foreach ($oneWayFlights as $flight) {
            echo '<form method="POST" action="../controllers/book-flight.php" class="flight-card">';

            echo '<div class="flight-info">';
            echo '<div class="airline-info">';
            echo '<img src="' . $flight['photo'] . '" alt="Airline Logo" class="airline-logo">';
            echo '<strong>' . $flight['airline'] . '</strong>';
            echo '</div>';
            echo '<ul>';
            echo '<li><strong>From:</strong> <span id="departure">' . $flight['from'] . '</span></li>';
            echo '<li><strong>To:</strong> <span id="arrival">' . $flight['to'] . '</span></li>';
            echo '<li><strong>Departure Time:</strong> <span id="departure-time">' . $flight['departure_time'] . '</span></li>';
            echo '<li><strong>Arrival Time:</strong> <span id="arrival-time">' . $flight['arrival_time'] . '</span></li>';
            echo '</ul>';
            echo '</div>';

            echo '<div class="flight-info">';
            echo '<div class="airline-info">';
            echo '<img src="' . $flight2['photo'] . '" alt="Airline Logo" class="airline-logo">';
            echo '<strong>' . $flight2['airline'] . '</strong>';
            echo '</div>';
            echo '<ul>';
            echo '<li><strong>From:</strong> <span id="departure">' . $flight2['from'] . '</span></li>';
            echo '<li><strong>To:</strong> <span id="arrival">' . $flight2['to'] . '</span></li>';
            echo '<li><strong>Departure Time:</strong> <span id="departure-time">' . $flight2['departure_time'] . '</span></li>';
            echo '<li><strong>Arrival Time:</strong> <span id="arrival-time">' . $flight2['arrival_time'] . '</span></li>';
            echo '</ul>';
            echo '</div>';


            echo '<div class="flight-price">';
            echo '<p><strong>Total Price:</strong> $' . ($_SESSION['adults'] * ($flight['price'] + $flight2['price'])) . '</p>';
            echo '<p style="font-size: 0.8em;">Price: $' .  ($flight['price'] + $flight2['price']) . '</p>';
            echo '<input type="hidden" name="price" value="' . ($_SESSION['adults'] * ($flight['price'] + $flight2['price'])) . '">';
            echo '<input type="hidden" name="flight1_id" value="' . $flight['id'] . '">';
            echo '<input type="hidden" name="flight2_id" value="' . $flight2['id'] . '">';
            echo '<input type="hidden" name="departure_time1" value="' . $flight['departure_time'] . '">';
            echo '<input type="hidden" name="arrival_time1" value="' . $flight['arrival_time'] . '">';
            echo '<input type="hidden" name="departure_time2" value="' . $flight2['departure_time'] . '">';
            echo '<input type="hidden" name="arrival_time2" value="' . $flight2['arrival_time'] . '">';
            echo '<button type="submit" class="select-btn" name="select_flight" value="' . $flight2['id'] . '+' . $flight['id'] . '">Select</button>';
            echo '</div>';
            echo '</div>';


            echo '</form>';
          }
        }
      } else {
        foreach ($oneWayFlights as $flight) {
          echo '<form method="POST" action="../controllers/book-flight.php" class="flight-card">';

          echo '<div class="flight-info">';
          echo '<div class="airline-info">';
          echo '<img src="' . $flight['photo'] . '" alt="Airline Logo" class="airline-logo">';
          echo '<strong>' . $flight['airline'] . '</strong>';
          echo '</div>';
          echo '<ul>';
          echo '<li><strong>From:</strong> <span id="departure">' . $flight['from'] . '</span></li>';
          echo '<li><strong>To:</strong> <span id="arrival">' . $flight['to'] . '</span></li>';
          echo '<li><strong>Departure Time:</strong> <span id="departure-time">' . $flight['departure_time'] . '</span></li>';
          echo '<li><strong>Arrival Time:</strong> <span id="arrival-time">' . $flight['arrival_time'] . '</span></li>';
          echo '</ul>';
          echo '</div>';

          echo '<div class="flight-price">';
          echo '<p><strong>Price:</strong> $' . $flight['price'] . '</p>';
          echo '<input type="hidden" name="flight1_id" value="' . $flight['id'] . '">';
          echo '<input type="hidden" name="departure_time1" value="' . $flight['departure_time'] . '">';
          echo '<input type="hidden" name="arrival_time1" value="' . $flight['arrival_time'] . '">';
          echo '<button type="submit" class="select-btn" name="select_flight" value="' . $flight['id'] . '">Select</button>';
          echo '</div>';

          echo '</form>';
        }
      }
      ?>

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

  <script src="../../assets/js/book-flight.js"></script>
</body>

</html>