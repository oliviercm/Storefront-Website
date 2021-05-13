import {
    getProducts,
} from "./util-products.js";
import {
    getOrders,
} from "./util-orders.js";

(async () => {
    try {
        renderOrders();
    } catch(e) {
        console.error(e);
    };
})();

async function renderOrders() {
    const products = await getProducts();
    const orders = (await getOrders()).sort((a, b) => {
        return Date.parse(b.created_at) - Date.parse(a.created_at);
    });

    const orderItemsElement = document.getElementById("order-items");
    const orderContainerTemplate = document.getElementById("order-container-template");
    const orderItemTemplate = document.getElementById("order-item-template");
    const orderPriceTemplate = document.getElementById("order-price-template");
    try {
        for (const order of orders) {
            const orderContainer = orderContainerTemplate.content.firstElementChild.cloneNode(true);
            const orderDateElement = orderContainer.querySelector(".order-date");
            orderDateElement.textContent = `Date: ${new Date(order.created_at).toLocaleString()}`;

            for (const product of order.products) {
                const item = products.find(p => {
                    return p.id === product.id;
                });
                if (!item) {
                    continue;
                };
                const orderItem = orderItemTemplate.content.firstElementChild.cloneNode(true);

                const orderItemImageElement = orderItem.querySelector(".order-item-image img");
                orderItemImageElement.setAttribute("src", `../images/${item.image}`);

                const orderItemLinkElement = orderItem.querySelector(".order-item-main .order-item-link");
                orderItemLinkElement.textContent = item.name;
                orderItemLinkElement.setAttribute("href", `./products/product.php?id=${item.id}`);

                const orderItemQuantityElement = orderItem.querySelector(".order-item-main .order-item-quantity");
                orderItemQuantityElement.textContent = `x${product.quantity}`;

                orderContainer.appendChild(orderItem);
            };
            const orderPriceContainer = orderPriceTemplate.content.firstElementChild.cloneNode(true);
            const orderPrice = orderPriceContainer.querySelector(".order-price");
            orderPrice.textContent = (order.price / 100).toLocaleString("en-US", {style: "currency", currency: "USD"});
            orderContainer.appendChild(orderPriceContainer);
            orderContainer.appendChild(document.createElement("hr"));
            orderItemsElement.appendChild(orderContainer);
        };
    } catch(e) {
        console.error(e);
    };
};