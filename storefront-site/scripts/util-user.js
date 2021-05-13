function getUser() {
    return JSON.parse(sessionStorage.getItem("user") || "{}");
};

function setUser(user) {
    sessionStorage.setItem("user", JSON.stringify(user));
};

function logoutUser() {
    sessionStorage.removeItem("user");
    sessionStorage.removeItem("cart");
    localStorage.removeItem("csrf-token");
    window.location.replace("/index.php");
};

/**
 * Used for mapping the backend's user object schema to the frontend's user object schema.
 */
function mapUserForSessionStorage(user) {
    return JSON.stringify({
        email: user.email,
        full_name: user.name,
        email_subscriptions: {
            newsletter: user.preferences.email_newsletter_subscribed === "1",
            promotions: user.preferences.email_promotions_subscribed === "1",
            reminders: user.preferences.email_reminders_subscribed === "1",
        },
    });
};

/**
 * Refreshes the user object in session storage by making a database call.
 */
async function refreshUser() {
    const response = await fetch("/php/user.php", {
        method: "GET",
        headers: {
            "X-CSRF-TOKEN": localStorage.getItem("csrf-token"),
        },
    });
    const user = (await response.json()).user;
    sessionStorage.setItem("user", mapUserForSessionStorage(user));
};

async function updateUserName(name) {
    const requestBody = {
        name: name,
    };
    const response = await fetch("/php/changename.php", {
        method: "PUT",
        headers: {
            "X-CSRF-TOKEN": localStorage.getItem("csrf-token"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify(requestBody),
    });
    if (200 <= response.status && response.status < 300) {
        return response;
    } else {
        throw response;
    };
};

async function updateUserEmail(email) {
    const requestBody = {
        email: email,
    };
    const response = await fetch("/php/changeemail.php", {
        method: "PUT",
        headers: {
            "X-CSRF-TOKEN": localStorage.getItem("csrf-token"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify(requestBody),
    });
    if (200 <= response.status && response.status < 300) {
        return response;
    } else {
        throw response;
    };
};

async function updateUserPassword(currentPassword, newPassword, repeatPassword) {
    const requestBody = {
        current_password: currentPassword,
        new_password: newPassword,
        repeat_password: repeatPassword,
    };
    const response = await fetch("/php/changepassword.php", {
        method: "PUT",
        headers: {
            "X-CSRF-TOKEN": localStorage.getItem("csrf-token"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify(requestBody),
    });
    if (200 <= response.status && response.status < 300) {
        return response;
    } else {
        throw response;
    };
};

async function updateUserEmailPreferences(newsletter, promotions, reminders) {
    const requestBody = {
        email_newsletter_subscribed: newsletter,
        email_promotions_subscribed: promotions,
        email_reminders_subscribed: reminders,
    };
    const response = await fetch("/php/changeemailsubscription.php", {
        method: "PUT",
        headers: {
            "X-CSRF-TOKEN": localStorage.getItem("csrf-token"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify(requestBody),
    });
    if (200 <= response.status && response.status < 300) {
        return response;
    } else {
        throw response;
    };
};

export {
    getUser,
    setUser,
    logoutUser,
    mapUserForSessionStorage,
    refreshUser,
    updateUserName,
    updateUserEmail,
    updateUserPassword,
    updateUserEmailPreferences,
};