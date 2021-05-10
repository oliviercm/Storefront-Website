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
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/header.php";?>
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
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/footer.php";?>
    <script src="../scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>