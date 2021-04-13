import {
    getUser,
    setUser,
} from "./util-user.js";

(() => {
    try {
        addUserPreferencesHandlers();
    } catch(e) {
        console.error(e);
    };
})();

function addUserPreferencesHandlers() {
    const userNameFormElement = document.getElementById("user-name-form");
    if (userNameFormElement) {
        userNameFormElement.addEventListener("submit", handleUserNameSubmit, false);
    };
    
    const userEmailFormElement = document.getElementById("user-email-form");
    if (userEmailFormElement) {
        userEmailFormElement.addEventListener("submit", handleUserEmailSubmit, false);
    };

    const userSubscriptionsFormElement = document.getElementById("user-subscriptions-form");
    if (userSubscriptionsFormElement) {
        userSubscriptionsFormElement.addEventListener("submit", handleUserSubscriptionsSubmit, false);
    };

    const userUnsubscribeFromAllElement = document.getElementById("user-unsubscribe-all-button");
    if (userUnsubscribeFromAllElement) {
        userUnsubscribeFromAllElement.addEventListener("click", handleUnsubscribeFromAll, false);
    };

    const userPasswordFormElement = document.getElementById("user-password-form");
    if (userPasswordFormElement) {
        userPasswordFormElement.addEventListener("submit", handleUserPasswordSubmit, false);
    };
};

function handleUserNameSubmit(event) {
    const formData = new FormData(event.target);
    const invalid = {
        name: false,
    };

    if (formData.get("name").length === 0) {
        invalid.name = true;
        document.getElementById("error-message-name").textContent = "Enter your name.";
    };

    if (invalid.name) {
        document.getElementById("error-message-container-name").style.display = "block";
        document.getElementById("user-name-input").classList.add("invalid");
    } else {
        document.getElementById("error-message-container-name").style.display = "none";
        document.getElementById("user-name-input").classList.remove("invalid");
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
        const user = getUser();
        user.full_name = new FormData(event.target).get("name");
        setUser(user);
    };
};

function handleUserEmailSubmit(event) {
    const formData = new FormData(event.target);
    const invalid = {
        email: false,
    };

    if (formData.get("email").length === 0) {
        invalid.email = true;
        document.getElementById("error-message-email").textContent = "Enter your email.";
    } else if (!/^.+@.+$/.test(formData.get("email"))) {
        invalid.email = true;
        document.getElementById("error-message-email").textContent = "Enter a valid email.";
    };

    if (invalid.email) {
        document.getElementById("error-message-container-email").style.display = "block";
        document.getElementById("user-email-input").classList.add("invalid");
    } else {
        document.getElementById("error-message-container-email").style.display = "none";
        document.getElementById("user-email-input").classList.remove("invalid");
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
        const user = getUser();
        user.email = new FormData(event.target).get("email");
        setUser(user);
    };
};

function handleUserPasswordSubmit(event) {
    const formData = new FormData(event.target);
    const invalid = {
        current: false,
        new: false,
        repeat: false,
    };

    if (formData.get("current-password").length === 0) {
        invalid.current = true;
        document.getElementById("error-message-password").textContent = "Enter your password.";
    };
    if (formData.get("new-password").length === 0) {
        invalid.new = true;
        document.getElementById("error-message-new").textContent = "Enter new password.";
    } else if (formData.get("new-password").length < 6) {
        invalid.new = true;
        document.getElementById("error-message-new").textContent = "New password must be at least 6 characters.";
    };
    if (formData.get("repeat-password") !== formData.get("new-password")) {
        invalid.repeat = true;
        document.getElementById("error-message-repeat").textContent = "Passwords do not match.";
    };

    if (invalid.current) {
        document.getElementById("error-message-container-password").style.display = "block";
        document.getElementById("current-password").classList.add("invalid");
    } else {
        document.getElementById("error-message-container-password").style.display = "none";
        document.getElementById("current-password").classList.remove("invalid");
    };
    if (invalid.new) {
        document.getElementById("error-message-container-new").style.display = "block";
        document.getElementById("new-password").classList.add("invalid");
    } else {
        document.getElementById("error-message-container-new").style.display = "none";
        document.getElementById("new-password").classList.remove("invalid");
    };
    if (invalid.repeat) {
        document.getElementById("error-message-container-repeat").style.display = "block";
        document.getElementById("repeat-password").classList.add("invalid");
    } else {
        document.getElementById("error-message-container-repeat").style.display = "none";
        document.getElementById("repeat-password").classList.remove("invalid");
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
        // Send change password request
    };
};

function handleUserSubscriptionsSubmit(event) {
    const user = getUser();
    user.email_subscriptions.newsletter = new FormData(event.target).get("newsletter") ? true : false;
    user.email_subscriptions.promotions = new FormData(event.target).get("promotions") ? true : false;
    user.email_subscriptions.reminders = new FormData(event.target).get("reminders") ? true : false;
    setUser(user);
};

function handleUnsubscribeFromAll(event) {
    const user = getUser();
    user.email_subscriptions.newsletter = false;
    user.email_subscriptions.promotions = false;
    user.email_subscriptions.reminders = false;
    setUser(user);
    window.location.href = "./user-preferences.html";
};