<?php
require __DIR__ . '/../../config/config.php';

use Src\Models\Place;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Planner</title>
    <link rel="stylesheet" href="../../assets/css/home.css">
</head>


<body>
    <?php include('./nav-bar.php'); ?>
    <div class="header">


        <div class="search-box">
            <h1>Your Trip Starts Here</h1>
            <p>Secure payment | Support in approx. 30s</p>

            <form method="POST" action="../controllers/home.php" id="flightForm" class="search-form">
                <div class="form-row">
                    <label><input id="roundTrip" type="radio" name="trip" checked value="round_trip"> Round-trip</label>
                    <label><input id="oneWayTrip" type="radio" name="trip" value="one-way"> One-way</label>
                </div>
                <div class="search-form-row2">
                    <input id="leaving-from" type="text" list="locations" name="leaving_from" placeholder="from">
                    <input id="going-to" type="text" list="locations" name="going_to" placeholder="to">
                    <datalist id="locations">

                        <?php
                        $places = Place::all();
                        foreach ($places as $place) {
                            echo "<option value='{$place->name}'>";
                        }
                        ?>
                    </datalist>
                    <input type="date" id="departure-date" name="departure_date" placeholder="Departure Date">
                    <input type="date" id="return-date" name="return_date" placeholder="Return Date">

                    <div class="passenger-select">
                        <label for="adults">Adults:</label>
                        <button type="button" id="decreaseAdults" class="passenger-btn">-</button>
                        <input type="number" id="adults" name="adults" class="search-input" value="1" min="1">
                        <button type="button" id="increaseAdults" class="passenger-btn">+</button>

                    </div>
                    <input type="text" id="custom-input" placeholder="Enter number of adults and class" style="display:none;" />
                </div>
                <div class="form-row">
                    <input type="submit" class="search-button" id="searchBtn" value="Search">
                </div>
            </form>

        </div>
    </div>

    <section class="offers-carousel">
        <div class="carousel-wrapper">
            <div class="carousel-item">
                <img src="../../assets/images/Paris.webp" alt="Paris">
                <p>Enjoy 30% off on flights to Paris!</p>
                <p>Book your dream vacation now.</p>
            </div>
            <div class="carousel-item">
                <img src="../../assets/images/london.webp" alt="London">
                <p>Special deals to London!</p>
                <p>Get a free suitcase with your ticket.</p>
            </div>
            <div class="carousel-item">
                <img src="../../assets/images/haway.jpg" alt="Hawaii">
                <p>Weekend offers for Hawaii!</p>
                <p>Explore the beach life like never before.</p>
            </div>
        </div>
    </section>

    <div class="destination-gallery">
        <div class="destination-card">
            <img src="../../assets/images/madrid.png" alt="Madrid">
            <p>Explore the magic of Madrid!</p>
        </div>
        <div class="destination-card">
            <img src="../../assets/images/Dubai.jpg" alt="Dubai">
            <p>Discover!</p>
        </div>
        <div class="destination-card">
            <img src="../../assets/images/swes.jpg" alt="Swesra">
            <p>Enjoy Swesra!</p>
        </div>
        <div class="destination-card">
            <img src="../../assets/images/italy.webp" alt="Italy">
            <p>Most prominent currently!</p>
        </div>
    </div>


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
    <script src="../../assets/js/home.js"></script>

</body>

</html>
<?php
