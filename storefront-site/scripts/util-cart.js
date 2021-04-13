import {
    getProducts,
} from "./util-products.js";

function getCart() {
    return JSON.parse(sessionStorage.getItem("cart") || "[]");
};

function setCart(cart) {
    const MAX_QUANTITY = 20;
    for (const cartItem of cart) {
        cartItem.quantity = Math.min(Number(cartItem.quantity), MAX_QUANTITY);
    };
    sessionStorage.setItem("cart", JSON.stringify(cart));
    document.dispatchEvent(new Event("cartChange"));
};

function getCartItemById(id) {
    const cart = getCart();
    return cart.find(cartItem => {
        return cartItem.id === id;
    });
};

function addToCart(productId, quantity) {
    const cart = getCart();
    const productIndex = cart.findIndex(cartItem => {
        return cartItem.id === productId;
    });

    if (productIndex !== -1) {
        cart[productIndex].quantity = Number(cart[productIndex].quantity) + Number(quantity);
    } else {
        cart.push({
            id: productId,
            quantity: Number(quantity),
            selected: true,
            isGift: false,
        });
    };
    setCart(cart);
};

async function calculateCartValues() {
    const cart = getCart();
    const products = await getProducts();

    let cartSubtotal = 0;
    let cartItemQuantity = 0;
    for (const cartItem of cart) {
        if (cartItem.selected) {
            const product = products.find(product => {
                return product.id === cartItem.id;
            });
            const productPrice = product.discount_price.usd || product.price.usd;
            const productQuantity = cartItem.quantity;
            cartSubtotal += productPrice * productQuantity;
            cartItemQuantity += productQuantity;
        };
    };
    const SALES_TAX_RATE = 0.0725;
    const cartTax = cartSubtotal * SALES_TAX_RATE;
    const cartTotal = cartSubtotal + cartTax;

    return {
        cartSubtotal,
        cartItemQuantity,
        cartTax,
        cartTotal,
    };
};

export {
    getCart,
    setCart,
    getCartItemById,
    addToCart,
    calculateCartValues,
};