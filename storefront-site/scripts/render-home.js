
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

//loops through to create copies and append to the DOM
for (const product of productData) {

        const productElement = productTemplate.content.firstElementChild.cloneNode(true);
        productElement.setAttribute("product-id", product.id);
        console.log(productElement);

        const productImageElement = productElement.querySelector("img");
        productImageElement.setAttribute("src", `./images/${product.images[0]}`);
        console.log(productImageElement); 

        const productLinkElement = productElement.querySelector("a");
        productLinkElement.setAttribute("href", `./html/products/product.html?id=${product.id}`);
        console.log(productLinkElement);  

        productGrid.appendChild(productElement);

        };
