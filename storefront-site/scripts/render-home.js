
//Pulls data from JSON
async function getProducts() {
    const response = await fetch("/mock-data/products.json"); // This will be replaced with an actual API call.  t   `
    if (response.status < 200 || response.status >= 300) {     
        throw Error(response.statusText);
    };
    const products = await response.json();
    return products;
};

const productData = await getProducts();

//gets the product-grid
const productGrid = document.querySelector(".inner-grid-product-listings")

//gets the template 
const productTemplate = document.getElementById("product-template");
const popularProductTemplate = document.getElementById("popular-product-template");


//loops through to create copies and append to the DOM
for (const product of productData) {

        const productElement = productTemplate.content.firstElementChild.cloneNode(true);
        productElement.setAttribute("product-id", product.id);
        // console.log(productElement);

        const productImageElement = productElement.querySelector("img");
        productImageElement.setAttribute("src", `./images/${product.images[0]}`);
        // console.log(productImageElement); 

        const productLinkElement = productElement.querySelector("a");
        productLinkElement.setAttribute("href", `./html/products/product.html?id=${product.id}`);
        // console.log(productLinkElement);  

        productGrid.appendChild(productElement);

        };


//Display popular product
const randomPopular = productData[Math.floor(Math.random() * productData.length)];
console.log(randomPopular);

const popularProductElement = popularProductTemplate.content.firstElementChild.cloneNode(true);
const popularProductImage = popularProductElement.querySelector("img");
popularProductImage.setAttribute("src", `./images/${randomPopular.images}`);
const popularProductLink = popularProductElement.querySelector(".popular-product-link");
popularProductLink.setAttribute("href", `./html/products/product.html?id=${randomPopular.id}`);
const seePopularProducts = popularProductElement.querySelector(".see-popular-products");
popularProductLink.setAttribute("href", `./html/products/product.html?id=${randomPopular.id}`);


console.log(popularProductElement);
popularProductTemplate.appendChild(popularProductElement);



// console.log(popularProductImage); 

// popularProductTemplate.appendChild(popularProductElement);
//Display currently popular product

// well, actually I guess it depends on which category we are doing
// for highest rated, it would be sort then pick the first element
// on sale, filter then pick random
// same for under $20
// currently popular, just pick a random product from the entire set, doesn't matter

// const sorted = products.sort((a, b) => {
//     return a.rating - b.rating;
//   });
//   const highestRating = sorted[0];


// const randomPopular = productData[Math.floor(Math.random() * productData.length)];
// console.log(randomPopular);


//     const popularProductElement = popularProductTemplate.content.firstElementChild.cloneNode(true);
//     popularProductElement.setAttribute("product-id", product.id);
//     console.log(productElement);

//     const productImageElement = productElement.querySelector("img");
//     productImageElement.setAttribute("src", `./images/${product.images[0]}`);
//     console.log(productImageElement); 

//     const productLinkElement = productElement.querySelector("a");
//     productLinkElement.setAttribute("href", `./html/products/product.html?id=${product.id}`);
//     console.log(productLinkElement);  

//     productGrid.appendChild(productElement);


//     var colors = ["red","blue","green","yellow"];
// var randColor = colors[Math.floor(Math.random() * colors.length)];
