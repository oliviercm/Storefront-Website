<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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
                <b>Change Password</b>
            </nav>
            <h1>Change Password</h1>
            <form id="user-password-form" class="preferences-form" action="./user-preferences.php">
                <div class="preferences-form-section">
                    Use the form below to change the password for your account.
                    <br>
                    <br>
                    <label for="current-password"><b>Current Password</b></label>
                    <input id="current-password" type="password" name="current-password" autofocus spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
                    <div id="error-message-container-password" style="display: none; color: #c41829;">
                        <span class="material-icons" style="font-size: 16px;">error</span>
                        <span id="error-message-password"></span>
                    </div>
                    <label for="new-password"><b>New Password</b></label>
                    <input id="new-password" type="password" name="new-password" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
                    <div id="error-message-container-new" style="display: none; color: #c41829;">
                        <span class="material-icons" style="font-size: 16px;">error</span>
                        <span id="error-message-new"></span>
                    </div>
                    <label for="repeat-password"><b>Repeat New Password</b></label>
                    <input id="repeat-password" type="password" name="repeat-password" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
                    <div id="error-message-container-repeat" style="display: none; color: #c41829;">
                        <span class="material-icons" style="font-size: 16px;">error</span>
                        <span id="error-message-repeat"></span>
                    </div>
                    <a href="../index.php">
                        <button type="submit" class="submit-button">Save Changes</button>
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
    <script src="../scripts/handle-user-preferences.js" type="module"></script>
    <script src="../scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>