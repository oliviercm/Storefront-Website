function getUser() {
    if (!sessionStorage.getItem("user")) {
        sessionStorage.setItem("user", JSON.stringify({
            email: "example@example.com",
            full_name: "John Doe",
            email_subscriptions: {
                newsletter: true,
                promotions: true,
                reminders: true,
            },
        }));
    };
    return JSON.parse(sessionStorage.getItem("user") || "{}");
};

function setUser(user) {
    sessionStorage.setItem("user", JSON.stringify(user));
};

export {
    getUser,
    setUser,
};