<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locations</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/locations.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>
<body>
    <!-- BEGIN HEADER -->
    <header>
        <div class="logo-container">
            <a href="../index.php">
                <img src="../images/logo-transparent.png" class="logo" alt="Pandemic Essentials Logo">
            </a>
        </div>
        <form class="search-form">
            <input type="search" class="search-field" autocomplete="off" placeholder="Search...">
        </form>
        <nav class="header-nav">
            <a href="./cart.php" class="header-nav-link"><span class="material-icons">shopping_cart</span> Cart (<span class="cart-total"></span>)</a>
            <a href="./user-preferences.php" class="header-nav-link"><span class="material-icons">settings</span>
                Preferences</a>
            <div class="header-login-dropdown">
                <a href="./login.php" class="header-nav-link">Sign In ▼</a>
                <nav class="header-login-dropdown-content">
                    <div>
                        <div class="header-login-dropdown-flex">
                            <a href="./login.php">Sign In <span class="material-icons"
                                    style="font-size: 16px;">login</span></a>
                            <a href="./register.php">Register <span class="material-icons"
                                    style="font-size: 16px;">person_add</span></a>
                            <a href="../index.php">Log Out <span class="material-icons"
                                    style="font-size: 16px;">logout</span></a>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>
    </header>
    <hr style="margin: 0; padding: 0; border: 0; height: 24px; box-shadow: inset 0 24px 24px -24px rgba(0, 0, 0, 0.5);">
    <!-- END HEADER -->
    <main>
        <div class="grid-container">
            <div class="sidebar">
                <nav class="sidebar-nav">
                    <span style="font-size: 1.2em;">Information</span>
                    <hr>
                    <ul>
                        <li>
                            <a href="./faq.php">FAQ</a>
                        </li>
                        <li>
                            <b>Locations and Hours</b>
                        </li>
                        <li>
                            <a href="./returns.php">Return Policy</a>
                        </li>
                        <li>
                            <a href="./shipping.php">Shipping</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="main">
                <h1>Locations and Hours</h1>
                <br>
                <div class="location-container">
                    <div class="location">
                        <div class="title">Pandemic Essentials</div>
                        <br>
                        <div class="address">
                            1600 Holloway Ave
                            <br>
                            San Francisco, CA 94132
                            <br>
                            <a href="tel:+1555-123-4567"><span class="material-icons" style="font-size: 1em">call</span> (555) 123-4567</a>
                            <br>
                        </div>
                        <br>
                        <div class="hours-today">
                            <b>Hours Today:</b> 9:00am to 5:00pm
                        </div>
                        <br>
                        <div class="hours">
                            Mon-Thu: 9:00am to 5:00pm
                            <br>
                            Fri-Sat: 10:00am to 2:00pm
                            <br>
                            Sun: Closed
                        </div>
                        <br>
                        <div class="directions">
                            <a href="https://www.google.com/maps/dir/Current+Location/37.7242849579085,-122.47995123052755">Get Directions</a>
                        </div>
                    </div>
                    <hr>
                    <div class="location">
                        <div class="title">Pandemic Essentials</div>
                        <br>
                        <div class="address">
                            1600 Amphitheatre Parkway
                            <br>
                            Mountain View, CA 94043
                            <br>
                            <a href="tel:+1555-123-4567"><span class="material-icons" style="font-size: 1em">call</span> (555) 222-2222</a>
                            <br>
                        </div>
                        <br>
                        <div class="hours-today">
                            <b>Hours Today:</b> 10:00am to 7:00pm
                        </div>
                        <br>
                        <div class="hours">
                            Mon-Thu: 10:00am to 7:00pm
                            <br>
                            Fri-Sat: 10:00am to 2:00pm
                            <br>
                            Sun: Closed
                        </div>
                        <br>
                        <div class="directions">
                            <a href="https://www.google.com/maps/dir/Current+Location/37.42244737427724,-122.0840346593695">Get Directions</a>
                        </div>
                    </div>
                    <hr>
                    <div class="location">
                        <div class="title">Pandemic Essentials</div>
                        <br>
                        <div class="address">
                            1 Infinite Loop
                            <br>
                            Cupertino, CA 95014
                            <br>
                            <a href="tel:+1555-123-4567"><span class="material-icons" style="font-size: 1em">call</span> (555) 404-2000</a>
                            <br>
                        </div>
                        <br>
                        <div class="hours-today">
                            <b>Hours Today:</b> 10:00am to 2:00pm
                        </div>
                        <br>
                        <div class="hours">
                            Mon-Thu: 10:00am to 2:00pm
                            <br>
                            Fri-Sun: Closed
                        </div>
                        <br>
                        <div class="directions">
                            <a href="https://www.google.com/maps/dir/Current+Location/37.332043228266734,-122.0302429728626">Get Directions</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3155.8093182024036!2d-122.48212918427993!3d37.72415342284245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7db005c0e281%3A0xa57a7c9f946a45d3!2sSan%20Francisco%20State%20University!5e0!3m2!1sen!2sus!4v1617075896347!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </main>
    <!-- BEGIN FOOTER -->
    <footer>
        <div class="footer-nav-container">
            <nav class="footer-nav">
                <b class="footer-nav-header">Information</b>
                <a class="footer-nav-content" href="./aboutus.php">About Us</a>
                <a class="footer-nav-content" href="./locations.php">Locations & Hours</a>
                <a class="footer-nav-content" href="./tos.php">Terms of Service</a>
                <a class="footer-nav-content" href="./privacy-policy.php">Privacy Policy</a>
            </nav>
            <nav class="footer-nav">
                <b class="footer-nav-header">Services</b>
                <a class="footer-nav-content" href="./faq.php">FAQ</a>
                <a class="footer-nav-content" href="./returns.php">Returns</a>
                <a class="footer-nav-content" href="./shipping.php">Shipping</a>
            </nav>
            <nav class="footer-nav">
                <b class="footer-nav-header">Contact Us</b>
                <span class="footer-nav-content">By Phone (Mon-Fri 9am-5pm):</span>
                <span class="footer-nav-content"><a href="tel:+1555-123-4567">+1 (555) 123-4567</a></span>
                <span class="footer-nav-content">By Email:</span>
                <span class="footer-nav-content"><a
                        href="mailto:pandemic-essentials@example.com">pandemic-essentials@example.com</a></span>
            </nav>
            <nav class="footer-nav">
                <b class="footer-nav-header">Newsletter</b>
                <a class="footer-nav-content" href="./user-preferences-change-email-subscription.php">Subscribe</a>
                <a class="footer-nav-content" href="./user-preferences-change-email-subscription.php">Unsubscribe</a>
            </nav>
        </div>
        <hr>
        <nav class="footer-logo-container">
            <a href="../index.php">
                <img src="../images/logo-transparent.png" class="logo">
            </a>
        </nav>
    </footer>
    <!-- END FOOTER -->
    <script src="../scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>