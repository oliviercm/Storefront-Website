(() => {
    try {
        addLoginHandlers();
    } catch(e) {
        console.error(e);
    };
})();

function addLoginHandlers() {
    const loginFormElement = document.getElementById("login-form");
    if (loginFormElement) {
        console.log("foo")
        loginFormElement.addEventListener("submit", handleLoginSubmit, false);
    };
};

function handleLoginSubmit(event) {
    const formData = new FormData(event.target);
    const invalid = {
        email: false,
        password: false,
    };

    if (formData.get("email").length === 0) {
        document.getElementById("error-message-1").textContent = "Enter your email.";
        invalid.email = true;
    } else if (!/^.+@.+$/.test(formData.get("email"))) {
        document.getElementById("error-message-1").textContent = "Enter a valid email.";
        invalid.email = true;
    };
    if (formData.get("password").length === 0) {
        document.getElementById("error-message-2").textContent = "Enter your password.";
        invalid.password = true;
    };

    for (const field in invalid) {
        if (invalid[field]) {
            event.preventDefault();
        };
    };

    if (invalid.email) {
        document.getElementById("error-message-container-1").style.display = "block";
        document.getElementById("login-email-input").classList.add("invalid");
    } else {
        document.getElementById("error-message-container-1").style.display = "none";
        document.getElementById("login-email-input").classList.remove("invalid");
    };
    if (invalid.password) {
        document.getElementById("error-message-container-2").style.display = "block";
        document.getElementById("login-password-input").classList.add("invalid");
    } else {
        document.getElementById("error-message-container-2").style.display = "none";
        document.getElementById("login-password-input").classList.remove("invalid");
    };
};