<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/google-material-icons.css">
    <link rel="stylesheet" href="./styles/homepage.css">
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/homepage-banner.css">
    <link rel="stylesheet" href="./styles/grid-featured-products.css">
    <link rel="stylesheet" href="./styles/grid-product-listings.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="preload" href="./images/banner-text.png" as="image">
    <link rel="preload" href="./images/white-square.png" as="image">
</head>

<body>
    <!-- BEGIN HEADER -->
    <header>
        <div class="logo-container">
            <a href="./index.php">
                <img src="./images/logo-transparent.png" class="logo" alt="Pandemic Essentials Logo">
            </a>
        </div>
        <form class="search-form">
            <input type="search" class="search-field" autocomplete="off" placeholder="Search...">
        </form>
        <nav class="header-nav">
            <a href="./html/cart.php" class="header-nav-link"><span class="material-icons">shopping_cart</span> Cart
                (<span class="cart-total"></span>)</a>
            <a href="./html/user-preferences.php" class="header-nav-link"><span class="material-icons">settings</span>
                Preferences</a>
            <div class="header-login-dropdown">
                <a href="./html/login.php" class="header-nav-link">Sign In ▼</a>
                <nav class="header-login-dropdown-content">
                    <div>
                        <div class="header-login-dropdown-flex">
                            <a href="./html/login.php">Sign In <span class="material-icons"
                                    style="font-size: 16px;">login</span></a>
                            <a href="./html/register.php">Register <span class="material-icons"
                                    style="font-size: 16px;">person_add</span></a>
                            <a href="./index.php">Log Out <span class="material-icons"
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
        <div class="homepage-banner-container">
            <div class="homepage-banner">
                <img src="images/banner-text.png" alt="Homepage Welcome Banner">
            </div>
        </div>
        <div class="featured-products-container">
            <div class="featured-product-container">
                <div class="featured-product-content">
                    <h2>Currently Popular</h2>
                    <a id="popular-product-link">
                        <div class="featured-product">
                            <img id="random-popular-product" alt="Currently Popular Product" src="./images/white-square.png">
                        </div>
                    </a>
                    <span>
                        <a id="see-popular-products">See More</a>
                    </span>
                </div>
            </div>
            <div class="featured-product-container">
                <div class="featured-product-content">
                    <h2>On Sale</h2>
                    <a id="sale-product-link">
                        <div class="featured-product">
                            <img id="random-sale-product" alt="On Sale Product" src="./images/white-square.png">
                        </div>
                    </a>
                    <span>
                        <a id="see-sale-products">View Sale</a>
                    </span>
                </div>
            </div>
            <div class="featured-product-container">
                <div class="featured-product-content">
                    <h2>Highest Rating</h2>
                    <a id="high-rated-product-link">
                        <div class="featured-product">
                            <img id="high-rated-product" alt="Highest Rated Product" src="./images/white-square.png">
                        </div>
                    </a>
                    <span>
                        <a id="see-high-rated-products">Highest Rated</a>
                    </span>
                </div>
            </div>
            <div class="featured-product-container">
                <div class="featured-product-content">
                    <h2>Under $20</h2>
                    <a id="cheap-product-link">
                        <div class="featured-product">
                            <img id="random-cheap-product" alt="Under $20 Product" src="./images/white-square.png">
                        </div>
                    </a>
                    <span>
                        <a id="see-cheaper-products">Shop Under $20</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="outer-grid-product-listings">
            <h2>Browse our full selection of products</h2>
            <div class="inner-grid-product-listings" id="product-grid">
                <template id="product-template">
                    <div>
                        <a>
                            <div class="product-listing">
                                <img alt="Product Image">
                            </div>
                        </a>
                    </div>
                </template>
            </div>
        </div>
    </main>
    <!-- BEGIN FOOTER -->
    <footer>
        <div class="footer-nav-container">
            <nav class="footer-nav">
                <b class="footer-nav-header">Information</b>
                <a class="footer-nav-content" href="./html/aboutus.php">About Us</a>
                <a class="footer-nav-content" href="./html/locations.php">Locations & Hours</a>
                <a class="footer-nav-content" href="./html/tos.php">Terms of Service</a>
                <a class="footer-nav-content" href="./html/privacy-policy.php">Privacy Policy</a>
            </nav>
            <nav class="footer-nav">
                <b class="footer-nav-header">Services</b>
                <a class="footer-nav-content" href="./html/faq.php">FAQ</a>
                <a class="footer-nav-content" href="./html/returns.php">Returns</a>
                <a class="footer-nav-content" href="./html/shipping.php">Shipping</a>
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
                <a class="footer-nav-content"
                    href="./html/user-preferences-change-email-subscription.php">Subscribe</a>
                <a class="footer-nav-content"
                    href="./html/user-preferences-change-email-subscription.php">Unsubscribe</a>
            </nav>
        </div>
        <hr>
        <nav class="footer-logo-container">
            <a href="./index.php">
                <img src="./images/logo-transparent.png" class="logo">
            </a>
        </nav>
    </footer>
    <!-- END FOOTER -->
    <script src="./scripts/render-home.js" type="module"></script>
    <script src="./scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>