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
        totalCartSubtotal,
        totalItemQuantity,
    } = await calculateTotalCartValues();
    const cartSubtotalItemQuantityElements = document.getElementsByClassName("total-cart-item-quantity");
    for (const itemQuantityElement of cartSubtotalItemQuantityElements) {
        itemQuantityElement.textContent = `${totalItemQuantity} ${totalItemQuantity === 1 ? "item" : "items"}`;
    };
    const cartSubtotalTotalPriceElements = document.getElementsByClassName("total-cart-subtotal");
    for (const itemSubtotalElement of cartSubtotalTotalPriceElements) {
        itemSubtotalElement.textContent = totalCartSubtotal.toFixed(2);
    };
    const SALES_TAX_RATE = 0.0725;
    const totalCartTax = totalCartSubtotal * SALES_TAX_RATE;
    const cartTotalTaxElements = document.getElementsByClassName("total-cart-tax");
    for (const totalTaxElement of cartTotalTaxElements) {
        totalTaxElement.textContent = totalCartTax.toFixed(2);
    };
    const totalCartTotal = totalCartSubtotal + totalCartTax;
    const cartTotalElements = document.getElementsByClassName("total-cart-total");
    for (const cartTotalElement of cartTotalElements) {
        cartTotalElement.textContent = totalCartTotal.toFixed(2);
    };
};