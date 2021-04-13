import {
    addToCart,
} from "./util-cart.js";

document.getElementById("add-to-cart-button").addEventListener("click", handleAddItems);

async function handleAddItems(event) {
    const productId = new URLSearchParams(window.location.search).get("id");
    const productQuantity = document.getElementById("product-quantity").value;
    addToCart(productId, productQuantity);
};