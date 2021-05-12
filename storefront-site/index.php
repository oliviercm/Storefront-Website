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
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/header.php";?>
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
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/footer.php";?>
    <script src="./scripts/render-home.js" type="module"></script>
    <script src="./scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>
