import {
    calculateTotalCartValues,
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
    } = await calculateTotalCartValues();
    const cartQuantityElements = document.getElementsByClassName("cart-total-item-quantity");
    for (const cartQuantityElement of cartQuantityElements) {
        cartQuantityElement.textContent = `${cartItemQuantity} ${cartItemQuantity === 1 ? "item" : "items"}`;
    };
    const cartSubtotalElements = document.getElementsByClassName("cart-subtotal");
    for (const cartSubtotalElement of cartSubtotalElements) {
        cartSubtotalElement.textContent = cartSubtotal.toFixed(2);
    };
    const SALES_TAX_RATE = 0.0725;
    const cartTax = cartSubtotal * SALES_TAX_RATE;
    const cartTaxElements = document.getElementsByClassName("total-cart-tax");
    for (const taxElement of cartTaxElements) {
        taxElement.textContent = cartTax.toFixed(2);
    };
    const cartTotal = cartSubtotal + cartTax;
    const cartTotalElements = document.getElementsByClassName("total-cart-total");
    for (const cartTotalElement of cartTotalElements) {
        cartTotalElement.textContent = cartTotal.toFixed(2);
    };
};