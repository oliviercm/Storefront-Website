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

async function handleLoginSubmit(event) {
    event.preventDefault();

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
    if (!hasError) {
        try {
            const response = await fetch("/php/authenticate.php?include=user", {
                method: "POST",
                body: formData,
            });
            if (200 <= response.status && response.status < 300) {
                const user = (await response.json()).user;
                sessionStorage.setItem("user", mapUserForSessionStorage(user));
                localStorage.setItem("csrf-token", response.headers.get("X-CSRF-TOKEN"));
                window.location.replace("/index.php");
            } else if (400 <= response.status && response.status < 500) {
                if (response.status === 401) {
                    document.getElementById("login-email-input").classList.add("invalid");
                    document.getElementById("login-password-input").classList.add("invalid");
                    document.getElementById("error-message-general").textContent = "Invalid email or password.";
                    document.getElementById("error-message-container-general").style.display = "block";
                } else {
                    document.getElementById("error-message-general").textContent = "Invalid credentials.";
                    document.getElementById("error-message-container-general").style.display = "block";
                };
            } else {
                throw Error();
            };
        } catch(e) {
            document.getElementById("error-message-general").textContent = "Unknown error. Please try again later.";
            document.getElementById("error-message-container-general").style.display = "block";
        };
    };
};

function mapUserForSessionStorage(user) {
    return JSON.stringify({
        email: user.email,
        full_name: user.name,
        email_subscriptions: {
            newsletter: user.preferences.email_newsletter_subscribed,
            promotions: user.preferences.email_promotions_subscribed,
            reminders: user.preferences.email_reminders_subscribed,
        },
    });
};