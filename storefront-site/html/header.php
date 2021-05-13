<header>
    <div class="logo-container">
        <a href="/index.php">
            <img src="/images/logo-transparent.png" class="logo" alt="Pandemic Essentials Logo">
        </a>
    </div>
    <form class="search-form">
        <input type="search" class="search-field" autocomplete="off" placeholder="Search...">
    </form>
    <nav class="header-nav">
        <a id="cart-button" href="/html/cart.php" class="header-nav-link"><span class="material-icons">shopping_cart</span> Cart
            (<span class="cart-total">0</span>)</a>
        <div class="header-login-dropdown">
            <a id="account-dropdown" class="header-nav-link" onclick="handleAccountDropdownButton()">Sign In ▼</a>
            <nav class="header-login-dropdown-content">
                <div>
                    <div class="header-login-dropdown-flex">
                        <a id="login-button" href="/html/login.php">Sign In <span class="material-icons"
                                style="font-size: 16px;">login</span></a>
                        <a id="register-button" href="/html/register.php">Register <span class="material-icons"
                                style="font-size: 16px;">person_add</span></a>
                        <a id="preferences-button" href="/html/user-preferences.php">Preferences <span class="material-icons"
                            style="font-size: 16px;">settings</span></a>
                        <a id="logout-button">Log Out <span class="material-icons"
                                style="font-size: 16px;">logout</span></a>
                    </div>
                </div>
            </nav>
        </div>
    </nav>
</header>
<hr style="margin: 0; padding: 0; border: 0; height: 24px; box-shadow: inset 0 24px 24px -24px rgba(0, 0, 0, 0.5);">
<script type="module">
import {
    logoutUser,
} from "/scripts/util-user.js";
import {
    refreshCart,
} from "/scripts/util-cart.js";

document.getElementById("logout-button").onclick = logoutUser;

if (sessionStorage.getItem("user")) {
    document.getElementById("account-dropdown").textContent = "Account ▼";
    document.getElementById("login-button").style.display = "none";
    document.getElementById("register-button").style.display = "none";
    document.getElementById("preferences-button").style.display = "block";
    document.getElementById("logout-button").style.display = "block";
    document.getElementById("cart-button").style.display = "inline";

    refreshCart();
} else {
    document.getElementById("account-dropdown").textContent = "Sign In ▼";
    document.getElementById("login-button").style.display = "block";
    document.getElementById("register-button").style.display = "block";
    document.getElementById("preferences-button").style.display = "none";
    document.getElementById("logout-button").style.display = "none";
    document.getElementById("cart-button").style.display = "none";
};

function handleAccountDropdownButton() {
    if (sessionStorage.getItem("user")) {
        logoutUser();
    } else {
        window.location.href = "/html/login.php";
    };
};
</script>