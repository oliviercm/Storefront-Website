function getUser() {
    return JSON.parse(sessionStorage.getItem("user") || "{}");
};

function setUser(user) {
    sessionStorage.setItem("user", JSON.stringify(user));
};

export {
    getUser,
    setUser,
};