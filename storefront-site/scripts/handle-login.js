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
        invalid.email = true;
        document.getElementById("error-message-email").textContent = "Enter your email.";
    } else if (!/^.+@.+$/.test(formData.get("email"))) {
        invalid.email = true;
        document.getElementById("error-message-email").textContent = "Enter a valid email.";
    };
    if (formData.get("password").length === 0) {
        invalid.password = true;
        document.getElementById("error-message-password").textContent = "Enter your password.";
    };

    if (invalid.email) {
        document.getElementById("error-message-container-email").style.display = "block";
        document.getElementById("login-email-input").classList.add("invalid");
    } else {
        document.getElementById("error-message-container-email").style.display = "none";
        document.getElementById("login-email-input").classList.remove("invalid");
    };
    if (invalid.password) {
        document.getElementById("error-message-container-password").style.display = "block";
        document.getElementById("login-password-input").classList.add("invalid");
    } else {
        document.getElementById("error-message-container-password").style.display = "none";
        document.getElementById("login-password-input").classList.remove("invalid");
    };

    let hasError = false;
    for (const field in invalid) {
        if (invalid[field]) {
            hasError = true;
        };
    };
    if (hasError) {
        event.preventDefault();
    } else {
        // Send login request
    };
};