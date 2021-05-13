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

export {
    getUser,
    setUser,
    logoutUser,
    mapUserForSessionStorage,
    refreshUser,
};