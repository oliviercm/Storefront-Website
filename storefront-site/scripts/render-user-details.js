import {
    getUser,
    refreshUser,
} from "./util-user.js";

(async () => {
    try {
        await refreshUser();
        renderUser();
    } catch(e) {
        console.error(e);
    };
})();

function renderUser() {
    const user = getUser();
    const userNameElements = document.getElementsByClassName("user-name");
    for (const userNameElement of userNameElements) {
        userNameElement.textContent = user.full_name;
    };
    const userNameInputElements = document.getElementsByClassName("user-name-input");
    for (const userNameInputElement of userNameInputElements) {
        userNameInputElement.value = user.full_name;
    };
    const userEmailElements = document.getElementsByClassName("user-email");
    for (const userEmailElement of userEmailElements) {
        userEmailElement.textContent = user.email;
    };
    const userEmailInputElements = document.getElementsByClassName("user-email-input");
    for (const userEmailInputElement of userEmailInputElements) {
        userEmailInputElement.value = user.email;
    };
    const userEmailNewsletterCheckboxElements = document.getElementsByClassName("user-email-newsletter-checkbox");
    for (const userEmailNewsletterCheckboxElement of userEmailNewsletterCheckboxElements) {
        userEmailNewsletterCheckboxElement.checked = user.email_subscriptions.newsletter;
    };
    const userEmailPromotionsCheckboxElements = document.getElementsByClassName("user-email-promotions-checkbox");
    for (const userEmailPromotionsCheckboxElement of userEmailPromotionsCheckboxElements) {
        userEmailPromotionsCheckboxElement.checked = user.email_subscriptions.promotions;
    };
    const userEmailRemindersCheckboxElements = document.getElementsByClassName("user-email-reminders-checkbox");
    for (const userEmailRemindersCheckboxElement of userEmailRemindersCheckboxElements) {
        userEmailRemindersCheckboxElement.checked = user.email_subscriptions.reminders;
    };
};