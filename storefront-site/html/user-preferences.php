<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Preferences</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/user-preferences.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/header.php";?>
    <main>
        <div class="preferences-outer-container">
            <nav class="hierarchical-nav">
                <a href="./user-preferences.php">Your Account</a>
                &nbsp;>&nbsp;
                <b>Preferences</b>
            </nav>
            <h1>Preferences</h1>
            <div class="preferences-form">
                <div class="preferences-form-section">
                    <a href="./user-preferences-change-name.php">
                        <button type="button">Edit</button>
                    </a>
                    <b>Name:</b>
                    <br>
                    <span class="user-name"></span>
                </div>
                <hr>
                <div class="preferences-form-section">
                    <a href="./user-preferences-change-email.php">
                        <button type="button">Edit</button>
                    </a>
                    <b>Email:</b>
                    <br>
                    <span class="user-email"></span>
                </div>
                <hr>
                <div class="preferences-form-section">
                    <a href="./user-preferences-change-password.php">
                        <button type="button">Edit</button>
                    </a>
                    <b>Password:</b>
                    <br>
                    ********
                </div>
                <hr>
                <div class="preferences-form-section">
                    <a href="./user-preferences-change-email-subscription.php">
                        <button type="button">Edit</button>
                    </a>
                    <b>Email Subscriptions:</b>
                    <br>
                    <span style="color: #505050;">Manage your email subscription preferences</span>
                </div>
            </div>
            <a href="../index.php">
                <button type="button" class="preferences-done-button">Done</button>
            </a>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/footer.php";?>
    <script src="../scripts/render-user-details.js" type="module"></script>
    <script src="../scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>