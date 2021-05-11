import {
    calculateCartValues,
} from "./util-cart.js";

// This function handles the initial render.
(async () => {
    try {
        renderCheckout();
    } catch(e) {
        console.error(e);
    };
})();

async function renderCheckout() {
    const {
        cartSubtotal,
        cartItemQuantity,
        cartTax,
        cartTotal,
    } = await calculateCartValues();
    const cartQuantityElements = document.getElementsByClassName("cart-total-item-quantity");
    for (const cartQuantityElement of cartQuantityElements) {
        cartQuantityElement.textContent = `${cartItemQuantity} ${cartItemQuantity === 1 ? "item" : "items"}`;
    };
    const cartSubtotalElements = document.getElementsByClassName("cart-subtotal");
    for (const cartSubtotalElement of cartSubtotalElements) {
        cartSubtotalElement.textContent = (cartSubtotal / 100).toLocaleString("en-US", {style: "currency", currency: "USD"});
    };
    const cartTaxElements = document.getElementsByClassName("total-cart-tax");
    for (const taxElement of cartTaxElements) {
        taxElement.textContent = (cartTax / 100).toLocaleString("en-US", {style: "currency", currency: "USD"});
    };
    const cartTotalElements = document.getElementsByClassName("total-cart-total");
    for (const cartTotalElement of cartTotalElements) {
        cartTotalElement.textContent = (cartTotal / 100).toLocaleString("en-US", {style: "currency", currency: "USD"});
    };
};