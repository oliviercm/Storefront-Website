import {
    getUser,
    setUser,
    updateUserName,
    updateUserEmail,
    updateUserPassword,
    updateUserEmailPreferences,
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
    event.preventDefault();

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
    if (!hasError) {
        updateUserName(new FormData(event.target).get("name")).then(result => {
            window.location.href = "/html/user-preferences.php";
        }).catch(err => {
            alert("Failed to update name. Please try again later.");
        });
    };
};

function handleUserEmailSubmit(event) {
    event.preventDefault();

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
    if (!hasError) {
        const user = getUser();
        const newEmail = new FormData(event.target).get("email");
        if (user.email === newEmail) {
            window.location.href = "/html/user-preferences.php";
            return;
        };
        updateUserEmail(newEmail).then(result => {
            window.location.href = "/html/user-preferences.php";
        }).catch(err => {
            alert("Failed to update email. Please try again later.");
        });
    };
};

function handleUserPasswordSubmit(event) {
    event.preventDefault();

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
    if (!hasError) {
        const formData = new FormData(event.target);
        updateUserPassword(formData.get("current-password"), formData.get("new-password"), formData.get("repeat-password")).then(result => {
            window.location.href = "/html/user-preferences.php";
        }).catch(err => {
            alert("Failed to update password. Please try again later.");
        });
    };
};

function handleUserSubscriptionsSubmit(event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const newsletter = formData.get("newsletter") ? true : false;
    const promotions = formData.get("promotions") ? true : false;
    const reminders = formData.get("reminders") ? true : false;
    updateUserEmailPreferences(newsletter, promotions, reminders).then(result => {
        window.location.href = "/html/user-preferences.php";
    }).catch(err => {
        alert("Failed to update email preferences. Please try again later.");
    });
};

function handleUnsubscribeFromAll(event) {
    event.preventDefault();
    
    updateUserEmailPreferences(false, false, false).then(result => {
        window.location.href = "/html/user-preferences.php";
    }).catch(err => {
        alert("Failed to update email preferences. Please try again later.");
    });
};