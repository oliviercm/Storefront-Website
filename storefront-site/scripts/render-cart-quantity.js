import {
    calculateCartValues,
} from "./util-cart.js"

(async () => {
    try {
        element.addEventListener("cartChange", renderCartQuantity);
        await renderCartQuantity();
    } catch (e) {
        console.error(e);
    };
})();


async function renderCartQuantity() {
    const {
        cartItemQuantity,
    } = await calculateCartValues();

    const cartItemTotals = document.getElementsByClassName("cart-total");
    for (const cartItemTotal of cartItemTotals) {
        cartItemTotal.textContent = cartItemQuantity;
    };
};
