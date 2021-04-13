import {
    getProducts,
} from "./util-products.js";

const productData = await getProducts();
const productGrid = document.querySelector(".inner-grid-product-listings");
const productTemplate = document.getElementById("product-template");

// Loops all products to create product listings and append to the product grid
for (const product of productData) {
    const productElement = productTemplate.content.firstElementChild.cloneNode(true);
    productElement.setAttribute("product-id", product.id);

    const productImageElement = productElement.querySelector("img");
    productImageElement.setAttribute("src", `./images/${product.images[0]}`);
    productImageElement.setAttribute("alt", product.name);

    const productLinkElement = productElement.querySelector("a");
    productLinkElement.setAttribute("href", `./html/products/product.html?id=${product.id}`);

    productGrid.appendChild(productElement);
};