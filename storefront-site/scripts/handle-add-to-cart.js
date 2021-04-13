import {
    getCart,
    setCart,
} from "./util-cart.js";

document.getElementById("add-to-cart-button").addEventListener("click", handleAddItems);
/*function addToCart() {
    console.log("added");
    sessionStorage.setItem("cart", JSON.stringify([{
        id: "5",
        quantity: 1,
        selected: true,
        isGift: false,
    }, {
        id: "6",
        quantity: 2,
        selected: true,
        isGift: false,
    }, {
        id: "7",
        quantity: 3,
        selected: false,
        isGift: true,
    }]));
}*/


async function handleAddItems(event) {
    const pageProductId = new URLSearchParams(window.location.search).get("id");
    const response = await fetch("/mock-data/products.json"); // This will be replaced with an actual API call.
    if (response.status < 200 || response.status >= 300) {
        throw Error(response.statusText);
    };
    const products = await response.json(); //load success
    //console.log(products);
    const currentProduct = products.find(product => {
        return product.id === pageProductId;
    });


    addToCart({
        id: currentProduct.id,
        quantity: 1,//get this from the "quantity" element
        selected: true,
        isGift: false
      })
    
};

function addToCart(product) {
    const cart = getCart();
    const indexOfExistingProduct = cart.findIndex(cartItem => {
        return cartItem.id === product.id;
      })
    console.log(indexOfExistingProduct);

    
    if (indexOfExistingProduct === 0) {
        console.log("test");
        cart.quantity = cart.quantity + 1;

    } else {
        cart.push(product);
    }
    setCart(cart);
    console.log(cart);
}