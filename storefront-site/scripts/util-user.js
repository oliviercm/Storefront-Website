function getUser() {
    return JSON.parse(sessionStorage.getItem("user") || "{}");
};

function setUser(user) {
    sessionStorage.setItem("user", JSON.stringify(user));
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

export {
    getUser,
    setUser,
};