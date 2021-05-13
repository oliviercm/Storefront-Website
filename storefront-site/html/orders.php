<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/orders.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/header.php";?>
    <main>
        <div class="main-container">
            <div class="orders-container">
                <div class="orders" id="orders">
                    <h1>Order History</h1>
                    <hr>
                    <div id="order-items">
                        
                    </div>
                    <template id="order-container-template">
                        <div class="order-container">
                            <div class="order-date-container">
                                <span class="order-date"></span>
                            </div>
                        </div>
                    </template>
                    <template id="order-item-template">
                        <div class="order-item">
                            <div class="order-item-image">
                                <img>
                            </div>
                            <div class="order-item-main">
                                <a class="order-item-link" href="./products/product.php?id=1" style="font-size: 1.1em;"></a>
                                &nbsp;
                                <span class="order-item-quantity" style="font-size: 1.1em; font-weight: bold;"></span>
                            </div>
                        </div>
                    </template>
                    <template id="order-price-template">
                        <div class="order-price-container">
                            Total:&nbsp;<span class="order-price"></span>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/footer.php";?>
    <script src="../scripts/render-orders.js" type="module"></script>
</body>

</html>