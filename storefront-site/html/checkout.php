<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/checkout.css">
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
        <div class="checkout-main-container">
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
                                    <span class="material-icons" style="color: #C0C0C0">check_box_outline_blank</span>
                                </div>
                                <div>
                                    <b>Confirmation</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form class="checkout-info-container">
                <div class="checkout-form">
                    <h2>Card Information</h2>
                    <label for="cardInfo"><b>CARD NUMBER</b></label><br>
                    <input type="text" oninput = "value=value.replace(/[^\d]/g,'')" id="cardNumber" name="cardNumber" maxlength="16" placeholder="0000 0000 0000 0000">
                    <input type="text" oninput = "value=value.replace(/[^\d]/g,'')" id="cvc" name="CVC" placeholder="CVC" maxlength="3" style="width:60px;">
                    <br>
                    <label for="cardName"><b>CARD HOLDER NAME</b></label><br>
                    <input type="text" id="cardName" name="cardName" placeholder="John Doe">
                    <br>
                    <label for="expiration"><b>EXPIRATION DATE</b></label><br>
                    <input list="Month" name="Month" placeholder="Month" style="width:60px;">
                    <datalist id="Month">
                        <option value="Jan">
                        <option value="Feb">
                        <option value="Mar">
                        <option value="Apr">
                        <option value="May">
                        <option value="June">
                        <option value="July">
                        <option value="Aug">
                        <option value="Sept">
                        <option value="Oct">
                        <option value="Nov">
                        <option value="Dec">
                    </datalist>
                    <input list="Year" name="Year" placeholder="Year" style="width:60px;">
                    <datalist id="Year">
                        <option value="2021">
                        <option value="2022">
                        <option value="2023">
                        <option value="2024">
                        <option value="2025">
                        <option value="2026">
                        <option value="2027">
                        <option value="2028">
                        <option value="2029">
                        <option value="2030">
                    </datalist>
                    <div style="margin: 30px 8px 20px 6px;border-top:1px dotted #C0C0C0;"></div>
                    <h2>Shipping Address</h2>
                    <label for="fullName"><b>FULL NAME</b></label><br>
                    <input type="text" id="fullName" name="fullName" placeholder="John Doe"><br>
                    <label for="streetAddress"><b>STREET ADDRESS</b></label><br>
                    <input type="text" id="streetAddress" name="streetAddress" value="">
                    <input type="text" id="Apt" name="Apt" placeholder="Apt/Unit" style="width:60px;"><br>
                    <label for="city"><b>TOWN/CITY</b></label><br>
                    <input type="text" id="streetAddress" name="streetAddress" value="" ><br>
                    <label for="state"><b>STATE</b></label><br>
                <input type="text" id="State" name="state" value="">
                <input type="text" oninput = "value=value.replace(/[^\d]/g,'')" id="Zip" name="Zip" maxlength="5" placeholder="Zip Code" style="width:60px;"><br>
                <h4>Billing Address</h4>
                    <div class="div-left">
                        <label for="sameAddress">Same as Shipping Address</label>
                        <input type="checkbox" id="sameAddress" name="sameAddress" value="sameAddress" checked>
                    </div>
                </div>
            </form>
            <div class="subtotal-container">
                <div class="subtotal">
                    <span>Subtotal (<span class="cart-total-item-quantity"></span>): <b>$<span class="cart-subtotal"></span></b></span><br>
                    <span>Delivery Fee: </span>
                    <span style="color: #007600;"><span class="material-icons" style="font-size: 1em;">check_circle</span> Free</span>
                    <br>
                    <span>Tax: <b>$<span class="total-cart-tax"></span></b></span><br>
                    <div style="margin: 30px 8px 20px 6px;border-top:1px dotted #C0C0C0;"></div>
                    <span style="font-size: 1.2em;">Total: <b>$<span class="total-cart-total"></span></b></span>
                    <a href="./confirmation.php">
                        <button type="submit" class="submit-button">Purchase</button>
                    </a>
                </div>
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
    <script src="../scripts/render-checkout.js" type="module"></script>
    <script src="../scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>