import {
    getProducts,
    getProductById,
} from "./util-products.js";

/**
 * This script loads and displays product data on the product.php page.
 * To load the product data, the product's ID must be provided as a query string parameter with key "id".
 */
(async () => {
    try {
        /**
         * Fetch and find specific product data.
         */
        const pageProductId = new URLSearchParams(window.location.search).get("id");
        const currentProduct = await getProductById(pageProductId);
        if (!currentProduct) {
            throw Error("Product ID not found.");
        };

        /**
         * Populate page with product fields.
         */
        document.title = `${currentProduct.name}`;

        const productImageElement = document.getElementById("product-listing-image");
        productImageElement.setAttribute("src", `../../images/${currentProduct.image}`);

        const productNameElement = document.getElementById("product-listing-name");
        productNameElement.textContent = currentProduct.name;

        const productRatingElement = document.getElementById("product-listing-rating");
        productRatingElement.textContent = `Rating: ${generateStars(currentProduct.rating)}`;

        const productStockElement = document.getElementById("product-listing-stock");
        const LOW_STOCK_CUTOFF = 20;
        // If there is low stock, display a different message.
        if (currentProduct.stock > LOW_STOCK_CUTOFF) {
            productStockElement.textContent = `In Stock.`;
        } else {
            productStockElement.textContent = `Only ${currentProduct.stock} left in stock - order soon.`;
            productStockElement.style.color = `#b12704`;
        };

        const productPriceElement = document.getElementById("product-listing-price");
        const originalPriceSpan = document.createElement("span");
        originalPriceSpan.appendChild(document.createTextNode((currentProduct.price / 100).toLocaleString("en-US", {style: "currency", currency: "USD"})));
        productPriceElement.appendChild(originalPriceSpan);
        // If there is a discounted price, strikethrough the original price and append the discounted price.
        if (currentProduct.discount_price) {
            originalPriceSpan.style.setProperty("text-decoration", "line-through");
            const discountedPriceSpan = document.createElement("span");
            discountedPriceSpan.appendChild(document.createTextNode((currentProduct.discount_price / 100).toLocaleString("en-US", {style: "currency", currency: "USD"})));
            productPriceElement.appendChild(document.createTextNode("\u00A0"));
            productPriceElement.appendChild(discountedPriceSpan);
        };

        const productDescriptionListElement = document.getElementById("product-listing-description");
        for (const desc of currentProduct.description) {
            const li = document.createElement("li");
            li.appendChild(document.createTextNode(desc));
            productDescriptionListElement.appendChild(li);
        };

        displayOtherProducts(currentProduct.id);
    } catch(e) {
        console.error(e);
    };
})();

async function displayOtherProducts(currentProductId) {
    const otherProducts = await findAdjacentProducts(currentProductId);
    for (const otherProduct of otherProducts) {
        const otherProductTemplate = document.getElementById("other-product-template");
        const otherProductElement = otherProductTemplate.content.firstElementChild.cloneNode(true);

        otherProductElement.querySelector("img").setAttribute("src", `../../images/${otherProduct.image}`);
        otherProductElement.querySelector("a").setAttribute("href", `./product.php?id=${otherProduct.id}`);

        const otherProductsDiv = document.getElementById("other-products");
        otherProductsDiv.appendChild(otherProductElement);
    };
};

/**
 * Generates a string of 5 stars, with ```filledStars``` stars filled in (solid) and the remainder hollow.
 * @param {Number} filledStars The number of filled stars to generate. Should be between 0 and 5.
 * @returns {String} A string of length 5 with ```filledStars``` solid stars followed by hollow stars, up to the max length of 5 stars.
 */
function generateStars(filledStars) {
    const MAX_STARS = 5;
    const emptyStarChar = '☆';
    const filledStarChar = '★';

    filledStars = Math.min(Math.max(0, Math.trunc(filledStars || 0)), MAX_STARS);
    return `${filledStarChar.repeat(filledStars)}${emptyStarChar.repeat(MAX_STARS - filledStars)}`;
};

/**
 * Returns the 4 products adjacent to the passed product ID (2 behind, 2 ahead).
 * @param {String} productId The current product ID to grab adjacent products around.
 * @returns {Array} An array of 4 adjacent products.
 */
async function findAdjacentProducts(productId) {
    const products = await getProducts();

    const index = products.findIndex(product => {
        return product.id === productId;
    });

    const offsets = [-2, -1, 1, 2];
    return offsets.map(offset => {
        return products[(index + products.length + offset) % products.length];
    });
};