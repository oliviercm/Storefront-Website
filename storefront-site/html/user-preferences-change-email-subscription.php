<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Email Subscriptions</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/user-preferences-change-subscription.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/header.php";?>
    <main>
        <div class="preferences-outer-container">
            <nav class="hierarchical-nav">
                <a href="./user-preferences.php">Your Account</a>
                &nbsp;>&nbsp;
                <a href="./user-preferences.php">Preferences</a>
                &nbsp;>&nbsp;
                <b>Change Email Subscriptions</b>
            </nav>
            <h1>Change Email Subscriptions</h1>
            <form id="user-subscriptions-form" class="preferences-form" action="./user-preferences.php">
                <div class="preferences-form-section">
                    Use the form below to change the email subscriptions for your account.
                    <br>
                    <br>
                    <label for="newsletter"><b>Subscribe to Newsletter</b></label>
                    <br>
                    <input class="user-email-newsletter-checkbox" type="checkbox" name="newsletter">Newsletter
                    <br>
                    <label for="promotions"><b>Subscribe to Promotions</b></label>
                    <br>
                    <input class="user-email-promotions-checkbox" type="checkbox" name="promotions">Promotions
                    <br>
                    <label for="reminders"><b>Subscribe to Reminders</b></label>
                    <br>
                    <input class="user-email-reminders-checkbox" type="checkbox" name="reminders">Reminders
                    <br>
                    <a href="../index.php">
                        <button type="submit" class="submit-button">Save Changes</button>
                    </a>
                    <br>
                    <br>
                    <span id="user-unsubscribe-all-button" class="clickable-text" href="./user-preferences-change-email-subscription.php">Unsubscribe from all</span>
                </div>
            </form>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/footer.php";?>
    <script src="../scripts/render-user-details.js" type="module"></script>
    <script src="../scripts/handle-user-preferences.js" type="module"></script>
    <script src="../scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>