<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Name</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/user-preferences-change.css">
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
                <b>Change Name</b>
            </nav>
            <h1>Change Name</h1>
            <form id="user-name-form" class="preferences-form" action="./user-preferences.php">
                <div class="preferences-form-section">
                    Use the form below to change the name for your account.
                    <br>
                    <br>
                    <label for="name"><b>New name</b></label>
                    <input id="user-name-input" class="user-name-input" type="text" name="name" autofocus spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
                    <div id="error-message-container-name" style="display: none; color: #c41829;">
                        <span class="material-icons" style="font-size: 16px;">error</span>
                        <span id="error-message-name"></span>
                    </div>
                    <a href="../index.php">
                        <button id="user-name-input-submit" type="submit" class="submit-button">Save Changes</button>
                    </a>
                    <div id="error-message-container-general" style="display: none; color: #c41829;">
                        <span class="material-icons" style="font-size: 16px;">error</span>
                        <span id="error-message-general"></span>
                    </div>
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