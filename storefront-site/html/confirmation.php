<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/confirmation.css">
    <link rel="stylesheet" href="../styles/grid-product-listings.css">
    <link rel="stylesheet" href="../styles/grid-featured-products.css">
    <link rel="stylesheet" href="../styles/cart.css">
</head>

<body>
    <!-- Header, the top bar , hyperlink is set up properly-->
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
        <div class="confirmation-main-container">
            <div class="progress-container">
                <div class="progress-inner-container">
                    <div class="progress">
                        <div class="progress-cart">
                            <div class="progress-step">
                                <div>
                                    <span class="material-icons" style="color: #007600">check_box</span>
                                </div>
                                <div>
                                    <b>Review Cart</b>
                                </div>
                            </div>
                        </div>
                        <div class="progress-payment">
                            <div class="progress-step">
                                <div>
                                    <span class="material-icons" style="color: #007600">check_box</span>
                                </div>
                                <div>
                                    <b>Checkout</b>
                                </div>
                            </div>
                        </div>
                        <div class="progress-confirmation">
                            <div class="progress-step">
                                <div>
                                    <span class="material-icons" style="color: #007600">check_box</span>
                                </div>
                                <div>
                                    <b>Confirmation</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="confirmation-confirm-container">
                <h1><b>Thank you for your purchase!</b></h1>
                <br>
                <b>Estimated delivery: 2 weeks</b>
                <br>
                You will recieve an email with your tracking number soon.
                <br>
                <br>
                <br>
                <a href="../index.php">Back to Homepage</a>
                <br><br><br>
            </div>
        </div>
        <div class="outer-grid-product-listings">
            <h2>Recommended Products For You</h2>
            <div class="other-products">
                <a href="./products/product.php?id=4">
                    <div class="product-listing">
                        <img src="../images/product4.png" alt="Product Image">
                    </div>
                </a>
                <a href="./products/product.php?id=5">
                    <div class="product-listing">
                        <img src="../images/product5.png" alt="Product Image">
                    </div>
                </a>
                <a href="./products/product.php?id=6">
                    <div class="product-listing">
                        <img src="../images/product6.png" alt="Product Image">
                    </div>
                </a>
                <a href="./products/product.php?id=7">
                    <div class="product-listing">
                        <img src="../images/product7.png" alt="Product Image">
                    </div>
                </a>
                <a href="./products/product.php?id=10">
                    <div class="product-listing">
                        <img src="../images/product10.png" alt="Product Image">
                    </div>
                </a>
            </div>
        </div>
    </main>
    <!-- Footer, hyperlink is set up, need a return page -->
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
                <a class="footer-nav-content" href="./shipping.php">Returns</a>
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