<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/faq.css">
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
                            <b>FAQ</b>
                        </li>
                        <li>
                            <a href="./locations.php">Locations and Hours</a>
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
            <div class="faq">
                <h1>Frequently Asked Questions</h1>
                <h3>1) How are returns handled?</h3>
                <p>You have 30 days to return an unopen and unused item from the date you received it. It must be in the
                    original packaging with the receipt.
        
                    You are responsible for the cost of shipping. All shipping costs are non refundable.
        
                    We will notify you upon receiving the order. If approved, you will receive credit.
                </p>
                <h3>2) How to contact us?</h3>
                <p>You can reach out to us via phone <a href="tel:+1555-123-4567">+1 (555) 123-4567</a> or email us at <a href="mailto:pandemic-essentials@example.com">pandemic-essentials@example.com</a>.</p>
                <h3>3) How do I reset my password?</h3>
                <p>You can reset your password <a href="./user-preferences-change-password.php">here</a>.</p>
                <h3>4) How can I check my order status?</h3>
                <p>Upon order confirmation you will get an email with the tracking code. You can also set up text notifications to check your order status!</p>
                <h3>5) How are international orders handled?</h3>
                <p>International orders may take 7-10 additional days for delivery and an extra delivery charge!</p>
                <h3>6) My order is defected, how do I get a replacement?</h3>
                <p>We offer a 100% satisfaction, if there is an issue with an order simply give us a call or email us to get the defected product replaced.</p>
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