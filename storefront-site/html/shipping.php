<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/privacy-policy.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/header.php";?>
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
                            <a href="./locations.php">Locations and Hours</a>
                        </li>
                        <li>
                            <a href="./returns.php">Return Policy</a>
                        </li>
                        <li>
                            <b>Shipping</b>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="shipping">
                <div>
                    <h1>Shipping</h1>
                    <br>
                    <p>For all orders over $50 or more please enjoy complimentary free shipping for domestic orders.</p>
                    <h2>What if I need it soon?</h2>
                    <p>Next Day Air shipping can be included through UPS for an additional $40.</p>
                    <h3>International Orders</h3>
                    <p>Please call and we will be able to assist you.</p>
                </div>
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/footer.php";?>
    <script src="../scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>