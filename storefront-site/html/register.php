<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/register.css">
    <link rel="stylesheet" href="../styles/mini-footer.css">
</head>

<body>
    <div class="register-outer-container">
        <a href="../index.php" class="logo">
            <img src="../images/logo-black.png" class="logo">
        </a>
        <form id="register-form" class="register-form" action="../index.php">
            <h1>Create Account</h1>
            <label for="name"><b>Your name</b></label>
            <input id="register-name-input" type="text" name="name" autofocus>
            <div id="error-message-container-name" style="display: none; color: #c41829;">
                <span class="material-icons" style="font-size: 16px;">error</span>
                <span id="error-message-name" style="font-size: 0.8em;"></span>
            </div>
            <div class="form-spacer"></div>
            <label for="email"><b>Email</b></label>
            <input id="register-email-input" type="text" name="email" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
            <div id="error-message-container-email" style="display: none; color: #c41829;">
                <span class="material-icons" style="font-size: 16px;">error</span>
                <span id="error-message-email" style="font-size: 0.8em;"></span>
            </div>
            <div class="form-spacer"></div>
            <label for="password"><b>Password</b></label>
            <input id="register-password-input" type="password" placeholder="At least 6 characters" name="password" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
            <div id="password-requirement">
                <span class="material-icons" style="font-size: 16px;">info</span> Passwords must be at least 6 characters.
            </div>
            <div id="error-message-container-password" style="display: none; color: #c41829;">
                <span class="material-icons" style="font-size: 16px;">error</span>
                <span id="error-message-password" style="font-size: 0.8em;"></span>
            </div>
            <br>
            <label for="password-repeat"><b>Re-enter password</b></label>
            <input id="register-password-repeat-input" type="password" name="password-repeat" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
            <div id="error-message-container-password-repeat" style="display: none; color: #c41829;">
                <span class="material-icons" style="font-size: 16px;">error</span>
                <span id="error-message-password-repeat" style="font-size: 0.8em;"></span>
            </div>
            <div class="form-spacer"></div>
            <button type="submit" class="create-account-button">Create your account</button>
            <br>
            <span id="disclaimer">By creating an account, you agree to our <a href="./tos.php">Terms of Service</a> and <a href="./privacy-policy.php">Privacy Policy</a>.</span>
            <hr>
            <span id="already-registered">Already have an account? <a href="./login.php">Sign In</a></span>
        </form>
    </div>
    <footer id="footer">
        <hr>
        <div class="mini-footer-container">
            <div class="mini-footer-content">
                <nav>
                    <a href="./tos.php">Terms of Service</a>
                    <a href="./privacy-policy.php">Privacy Policy</a>
                    <a href="./faq.php">Help</a>
                </nav>
                <span>
                    &copy; 2021, PandemicEssentials.com or its affiliates
                </span>
            </div>
        </div>
    </footer>
    <script src="../scripts/handle-register.js" type="module"></script>
</body>

</html>