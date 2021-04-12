import {
    getCart,
    setCart,
    getCartItemById,
    calculateCartValues,
} from "./util-cart.js";
import {
    getProducts,
    getProductById,
} from "./util-products.js";

// Load test data.
// REMOVE WHEN ADDING TO CART IS IMPLEMENTED!
sessionStorage.setItem("cart", JSON.stringify([{
    id: "2",
    quantity: 1,
    selected: true,
    isGift: false,
}, {
    id: "12",
    quantity: 2,
    selected: true,
    isGift: false,
}, {
    id: "4",
    quantity: 3,
    selected: false,
    isGift: true,
}]));

// This function handles the initial render of the cart page.
(async () => {
    try {
        renderCart();
    } catch(e) {
        console.error(e);
    };
})();

async function renderCart() {
    document.addEventListener("cartChange", handleCheckoutButton);
    await renderCartItems();
    await renderTotalCartValues();
    await renderOrderContainsGift();
};

async function renderCartItems() {
    const cart = getCart();
    const products = await getProducts();

    // Add event listeners
    const deselectAllItemsButtons = document.getElementsByClassName("deselect-all-button");
    for (const button of deselectAllItemsButtons) {
        button.addEventListener("click", handleDeselectAllItems);
    };

    const orderContainsGiftCheckbox = document.getElementById("cart-gift");
    orderContainsGiftCheckbox.addEventListener("click", handleOrderContainsGift);

    // checks if cart is empty and disables proceed to checkout
    handleCheckoutButton();

    // Render cart items using template.
    const cartItemsElement = document.getElementById("cart-items");
    const cartItemTemplate = document.getElementById("cart-item-template");
    for (const cartItem of cart) {
        try {
            const item = products.find(product => {
                return product.id === cartItem.id;
            });
            if (!item) {
                continue;
            };

            const cartItemElement = cartItemTemplate.content.firstElementChild.cloneNode(true);
            cartItemElement.setAttribute("data-product-id", cartItem.id);

            const cartItemCheckboxElement = cartItemElement.querySelectorAll(".cart-item-checkbox input[type=checkbox]")[0];
            cartItemCheckboxElement.checked = cartItem.selected;
            cartItemCheckboxElement.setAttribute("data-product-id", cartItem.id);
            cartItemCheckboxElement.addEventListener("change", handleSelectedCheckboxChange);

            const cartItemImageElement = cartItemElement.querySelectorAll(".cart-item-image img")[0];
            cartItemImageElement.setAttribute("src", `../images/${item.images[0]}`);

            const cartItemLinkElement = cartItemElement.querySelectorAll(".cart-item-main .cart-item-link")[0];
            cartItemLinkElement.textContent = item.name;
            cartItemLinkElement.setAttribute("href", `./products/product.html?id=${item.id}`);

            const cartItemStockElement = cartItemElement.querySelectorAll(".cart-item-main .cart-item-stock")[0];
            const LOW_STOCK_CUTOFF = 20;
            // If there is low stock, display a different message.
            if (item.stock > LOW_STOCK_CUTOFF) {
                cartItemStockElement.textContent = `In Stock`;
                cartItemStockElement.style.color = `#007600`;
            } else {
                cartItemStockElement.textContent = `Only ${item.stock} left in stock - order soon.`;
                cartItemStockElement.style.color = `#b12704`;
            };

            const cartItemIsGiftElement = cartItemElement.querySelectorAll(".cart-item-main .cart-item-gift")[0];
            cartItemIsGiftElement.checked = cartItem.isGift;
            cartItemIsGiftElement.setAttribute("data-product-id", cartItem.id);
            cartItemIsGiftElement.addEventListener("change", handleGiftCheckboxChange);

            const cartItemPriceElement = cartItemElement.querySelectorAll(".cart-item .cart-item-price")[0];
            const originalPriceSpan = document.createElement("span");
            originalPriceSpan.classList.add("cart-item-price-original");
            originalPriceSpan.setAttribute("data-product-id", cartItem.id);
            originalPriceSpan.appendChild(document.createTextNode(`$${(item.price.usd * cartItem.quantity).toFixed(2)}`));
            cartItemPriceElement.appendChild(originalPriceSpan);
            // If there is a discounted price, strikethrough the original price and append the discounted price.
            if (item.discount_price.usd) {
                originalPriceSpan.style.setProperty("text-decoration", "line-through");
                const discountedPriceSpan = document.createElement("span");
                discountedPriceSpan.classList.add("cart-item-price-discount");
                discountedPriceSpan.setAttribute("data-product-id", cartItem.id);
                discountedPriceSpan.appendChild(document.createTextNode(`$${(item.discount_price.usd * cartItem.quantity).toFixed(2)}`));
                cartItemPriceElement.appendChild(document.createTextNode("\u00A0"));
                cartItemPriceElement.appendChild(discountedPriceSpan);
            };

            const cartItemQuantityElement = cartItemElement.querySelectorAll(".cart-item-quantity")[0];
            cartItemQuantityElement.value = cartItem.quantity;
            cartItemQuantityElement.setAttribute("data-product-id", cartItem.id);
            cartItemQuantityElement.addEventListener("change", handleQuantityChange);

            const cartItemDeleteElement = cartItemElement.querySelectorAll(".cart-item-delete")[0];
            cartItemDeleteElement.setAttribute("data-product-id", cartItem.id);
            cartItemDeleteElement.addEventListener("click", handleCartItemDelete);
            
            // Insert the cart item and a horizontal rule
            cartItemsElement.appendChild(cartItemElement);
            const hr = cartItemsElement.appendChild(document.createElement("hr"));
            hr.classList.add("cart-item-hr");
            hr.setAttribute("data-product-id", cartItem.id);

            

        } catch(e) {
            console.error(e);
        };
    };
};

async function renderTotalCartValues() {
    // Calculate and set subtotal text (total quantity, total price)
    const {
        cartSubtotal,
        cartItemQuantity,
    } = await calculateCartValues();
    const cartQuantityElements = document.getElementsByClassName("cart-total-item-quantity");
    for (const cartQuantityElement of cartQuantityElements) {
        cartQuantityElement.textContent = `${cartItemQuantity} ${cartItemQuantity === 1 ? "item" : "items"}`;
    };
    const cartSubtotalElements = document.getElementsByClassName("cart-subtotal");
    for (const cartSubtotalElement of cartSubtotalElements) {
        cartSubtotalElement.textContent = cartSubtotal.toFixed(2);
    };
};

function renderOrderContainsGift() {
    const cart = getCart();
    // Check the "This order contains a gift" checkbox if necessary
    const cartContainsGiftElement = document.getElementById("cart-gift");
    cartContainsGiftElement.checked = cart.some(cartItem => {
        return cartItem.isGift;
    });
};

async function rerenderCartItem(productId) {
    const product = await getProductById(productId);
    const cartItem = getCartItemById(productId);

    const cartItemOriginalPriceElement = Array.from(document.getElementsByClassName("cart-item-price-original")).find(element => {
        return element.dataset.productId === productId;
    });
    cartItemOriginalPriceElement.textContent = `$${(product.price.usd * cartItem.quantity).toFixed(2)}`;
    
    const cartItemDiscountPriceElement = Array.from(document.getElementsByClassName("cart-item-price-discount")).find(element => {
        return element.dataset.productId === productId;
    });
    if (cartItemDiscountPriceElement) {
        cartItemDiscountPriceElement.textContent = `$${(product.discount_price.usd * cartItem.quantity).toFixed(2)}`;
    };
};

function handleQuantityChange(event) {
    const cart = getCart();
    const changedCartItem = cart.find(cartItem => {
        return cartItem.id === event.target.dataset.productId;
    });
    changedCartItem.quantity = Number(event.target.value);
    setCart(cart);
    rerenderCartItem(changedCartItem.id);
    renderTotalCartValues();
    document.dispatchEvent(new Event("cartChange"));
};

function handleDeselectAllItems(event) {
    const cartItemCheckboxes = Array.from(document.getElementsByClassName("cart-item-checkbox-input"));
    for (const checkbox of cartItemCheckboxes) {
        checkbox.checked = false;
    };

    const cart = getCart();
    for (const cartItem of cart) {
        cartItem.selected = false;
    };
    setCart(cart);
    renderTotalCartValues();
    renderOrderContainsGift();
    document.dispatchEvent(new Event("cartChange"));
};

function handleSelectedCheckboxChange(event) {
    const cart = getCart();
    const cartItem = cart.find(cartItem => {
        return cartItem.id === event.target.dataset.productId;
    });
    cartItem.selected = event.target.checked;
    setCart(cart);
    renderTotalCartValues();
    renderOrderContainsGift();
    document.dispatchEvent(new Event("cartChange"));
};

function handleGiftCheckboxChange(event) {
    const cart = getCart();
    const cartItem = cart.find(cartItem => {
        return cartItem.id === event.target.dataset.productId;
    });
    cartItem.isGift = event.target.checked;
    setCart(cart);
    renderOrderContainsGift();
};

function handleOrderContainsGift(event) {
    if (event.target.checked) {
        event.preventDefault();
        return false;
    };

    const cart = getCart();
    for (const cartItem of cart) {
        cartItem.isGift = false;
    };
    const cartItemGiftCheckboxes = Array.from(document.getElementsByClassName("cart-item-gift"));
    for (const checkbox of cartItemGiftCheckboxes) {
        checkbox.checked = false;
    };
    setCart(cart);
    renderTotalCartValues();
};

function handleCartItemDelete(event) {
    const cart = getCart();
    cart.splice(cart.findIndex(cartItem => {
        return cartItem.id === event.target.dataset.productId;
    }), 1);
    setCart(cart);
    removeCartItemElement(event.target.dataset.productId);
    renderTotalCartValues();
    document.dispatchEvent(new Event("cartChange"));
};

function removeCartItemElement(productId) {
    const cartItemElements = Array.from(document.getElementsByClassName("cart-item"));
    const cartItemElement = cartItemElements.find(cartItem => {
        return cartItem.dataset.productId === productId;
    });
    cartItemElement.parentNode.removeChild(cartItemElement);

    const cartItemHrElements = Array.from(document.getElementsByClassName("cart-item-hr"));
    const cartItemHrElement = cartItemHrElements.find(cartItemHr => {
        return cartItemHr.dataset.productId === productId;
    });
    cartItemHrElement.parentNode.removeChild(cartItemHrElement);
};

// for disabling proceed to checkout
async function handleCheckoutButton(event){
    const {
        cartItemQuantity
    } = await calculateCartValues(); 
    
    if (cartItemQuantity === 0) {
        const button = document.getElementById("button");
        return button.disabled = true;
    } else {
        const button = document.getElementById("button");
        return button.disabled = false;
    };
};
