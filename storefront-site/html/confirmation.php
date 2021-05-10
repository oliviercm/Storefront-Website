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
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/header.php";?>
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
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/footer.php";?>
    <script src="../scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>