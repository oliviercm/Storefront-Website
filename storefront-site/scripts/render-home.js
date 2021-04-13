// Pulls data from JSON
import {
    getProducts,
} from "./util-products.js";

(async function () {
    const productData = await getProducts();

    //loops through to create copies and append to the DOM
    const productGrid = document.querySelector(".inner-grid-product-listings");
    const productTemplate = document.getElementById("product-template");

    for (const product of productData) {

        const productElement = productTemplate.content.firstElementChild.cloneNode(true);
        productElement.setAttribute("product-id", product.id);

        const productImageElement = productElement.querySelector("img");
        productImageElement.setAttribute("src", `./images/${product.images[0]}`);

        const productLinkElement = productElement.querySelector("a");
        productLinkElement.setAttribute("href", `./html/products/product.html?id=${product.id}`);

        productGrid.appendChild(productElement);
    };

    //Display popular product
    const randomPopular = productData[Math.floor(Math.random() * productData.length)];
    const popularProductImage = document.getElementById("random-popular-product");
    popularProductImage.setAttribute("src", `./images/${randomPopular.images}`);
    const popularProductLink = document.getElementById("popular-product-link");
    popularProductLink.setAttribute("href", `./html/products/product.html?id=${randomPopular.id}`);
    const seePopularProducts = document.getElementById("see-popular-products");
    seePopularProducts.textContent = "See More";
    seePopularProducts.setAttribute("href", `./html/products/product.html?id=${randomPopular.id}`);

    //Display product under $20 
    const cheaperProducts = [];

    for (const cheapProduct of productData) {
        if (cheapProduct.price.usd < 20) {
            cheaperProducts.push(cheapProduct);
        }
    }

    const cheapItem = cheaperProducts[Math.floor(Math.random() * cheaperProducts.length)];
    const cheapProductImage = document.getElementById("random-cheap-product");
    cheapProductImage.setAttribute("src", `./images/${cheapItem.images}`);
    const cheapProductLink = document.getElementById("cheap-product-link");
    cheapProductLink.setAttribute("href", `./html/products/product.html?id=${cheapItem.id}`);
    const seeCheapProducts = document.getElementById("see-cheaper-products");
    seeCheapProducts.textContent = "Shop Under $20";
    seeCheapProducts.setAttribute("href", `./html/products/product.html?id=${cheapItem.id}`);

    //Random product for Discount
    const saleProducts = [];

    for (const discountedProduct of productData) {
        if (discountedProduct.discount_price.usd) {
            saleProducts.push(discountedProduct);
        }
    }

    const saleItem = saleProducts[Math.floor(Math.random() * saleProducts.length)];

    const saleProductImage = document.getElementById("random-sale-product");
    saleProductImage.setAttribute("src", `./images/${saleItem.images}`);
    const saleProductLink = document.getElementById("sale-product-link");
    saleProductLink.setAttribute("href", `./html/products/product.html?id=${saleItem.id}`);
    const seeSaleProducts = document.getElementById("see-sale-products");
    seeSaleProducts.textContent = "View Sale";
    seeSaleProducts.setAttribute("href", `./html/products/product.html?id=${saleItem.id}`);

    //Sort by Rating and display the first one
    const sorted = productData.sort((a, b) => {
        return b.rating - a.rating;
    });

    const highRating = sorted[0];

    const highRatedImage = document.getElementById("high-rated-product");
    highRatedImage.setAttribute("src", `./images/${highRating.images}`);
    const highRatedLink = document.getElementById("high-rated-product-link");
    highRatedLink.setAttribute("href", `./html/products/product.html?id=${highRating.id}`);
    const highRatedProducts = document.getElementById("see-high-rated-products");
    highRatedProducts.textContent = "Highest Rated";
    highRatedProducts.setAttribute("href", `./html/products/product.html?id=${highRating.id}`);
})();