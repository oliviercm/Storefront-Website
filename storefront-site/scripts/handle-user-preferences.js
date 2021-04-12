import {
    getUser,
    setUser,
} from "./util-user.js";

(async () => {
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
    const user = getUser();
    user.full_name = new FormData(event.target).get("name");
    setUser(user);
};

function handleUserEmailSubmit(event) {
    const user = getUser();
    user.email = new FormData(event.target).get("email");
    setUser(user);
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

function handleUserPasswordSubmit(event) {
    const formData = new FormData(event.target);
    const errors = {
        current: false,
        new: false,
        repeat: false,
    };
    if (formData.get("current-password").length === 0) {
        event.preventDefault();
        document.getElementById("error-message-container-1").style.display = "block";
        document.getElementById("error-message-1").textContent = "Enter your password.";
        document.getElementById("current-password").style.borderColor = "red";
        document.getElementById("current-password").style.boxShadow = "inset 0 0 3px red";
        errors.current = true;
    };
    if (formData.get("new-password").length === 0) {
        event.preventDefault();
        document.getElementById("error-message-container-2").style.display = "block";
        document.getElementById("error-message-2").textContent = "Enter new password.";
        document.getElementById("new-password").style.borderColor = "red";
        document.getElementById("new-password").style.boxShadow = "inset 0 0 3px red";
        errors.new = true;
    };
    if (formData.get("new-password").length < 6) {
        event.preventDefault();
        document.getElementById("error-message-container-2").style.display = "block";
        document.getElementById("error-message-2").textContent = "New password must be at least 6 characters.";
        document.getElementById("new-password").style.borderColor = "red";
        document.getElementById("new-password").style.boxShadow = "inset 0 0 3px red";
        errors.new = true;
    };
    if (formData.get("new-password") !== formData.get("repeat-password")) {
        event.preventDefault();
        document.getElementById("error-message-container-3").style.display = "block";
        document.getElementById("error-message-3").textContent = "Passwords do not match.";
        document.getElementById("repeat-password").style.borderColor = "red";
        document.getElementById("repeat-password").style.boxShadow = "inset 0 0 3px red";
        errors.repeat = true;
    };
    if (!errors.current) {
        document.getElementById("error-message-container-1").style.display = "none";
        document.getElementById("current-password").style.borderColor = "";
        document.getElementById("current-password").style.boxShadow = "";
    };
    if (!errors.new) {
        document.getElementById("error-message-container-2").style.display = "none";
        document.getElementById("new-password").style.borderColor = "";
        document.getElementById("new-password").style.boxShadow = "";
    };
    if (!errors.repeat) {
        document.getElementById("error-message-container-3").style.display = "none";
        document.getElementById("repeat-password").style.borderColor = "";
        document.getElementById("repeat-password").style.boxShadow = "";
    };
};