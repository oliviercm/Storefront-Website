import {
    splitSelectedCartItems,
    setCart,
} from "./util-cart.js";

document.getElementById("submit-button").onclick = handleCheckout;

async function handleCheckout(event) {
    event.preventDefault();

    const {
        selected: selectedCartItems,
        unselected: unselectedCartedItems,
    } = splitSelectedCartItems();
    const shippingAddress = {
        name: document.getElementById("fullName").value,
        address: document.getElementById("streetAddress").value,
        apt: document.getElementById("Apt").value,
        city: document.getElementById("city").value,
        state: document.getElementById("State").value,
        zip: document.getElementById("Zip").value,
    };
    const billingAddress = shippingAddress;

    const requestBody = {
        cart: selectedCartItems,
        shipping_address: shippingAddress,
        billing_address: billingAddress,
    };
    const response = await fetch("/php/order.php", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": localStorage.getItem("csrf-token"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify(requestBody),
    });
    if (200 <= response.status && response.status < 300) {
        window.location.replace("/html/confirmation.php");
        setCart(unselectedCartedItems);
    } else {
        alert("Checkout failed. Try again later.");
    };
};