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

// This function handles the initial render of the cart page.
(async () => {
    try {
        renderCart();
    } catch(e) {
        console.error(e);
    };
})();

async function renderCart() {
    document.addEventListener("cartChange", renderCheckoutButton);
    document.addEventListener("cartChange", renderTotalCartValues);
    document.addEventListener("cartChange", renderOrderContainsGift);
    await renderCartItems();
    await renderTotalCartValues();
    await renderOrderContainsGift();
    await renderCheckoutButton();
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

            const cartItemCheckboxElement = cartItemElement.querySelector(".cart-item-checkbox input[type=checkbox]");
            cartItemCheckboxElement.checked = cartItem.selected;
            cartItemCheckboxElement.setAttribute("data-product-id", cartItem.id);
            cartItemCheckboxElement.addEventListener("change", handleSelectedCheckboxChange);

            const cartItemImageElement = cartItemElement.querySelector(".cart-item-image img");
            cartItemImageElement.setAttribute("src", `../images/${item.images[0]}`);

            const cartItemLinkElement = cartItemElement.querySelector(".cart-item-main .cart-item-link");
            cartItemLinkElement.textContent = item.name;
            cartItemLinkElement.setAttribute("href", `./products/product.php?id=${item.id}`);

            const cartItemStockElement = cartItemElement.querySelector(".cart-item-main .cart-item-stock");
            const LOW_STOCK_CUTOFF = 20;
            // If there is low stock, display a different message.
            if (item.stock > LOW_STOCK_CUTOFF) {
                cartItemStockElement.textContent = `In Stock`;
                cartItemStockElement.style.color = `#007600`;
            } else {
                cartItemStockElement.textContent = `Only ${item.stock} left in stock - order soon.`;
                cartItemStockElement.style.color = `#b12704`;
            };

            const cartItemIsGiftElement = cartItemElement.querySelector(".cart-item-main .cart-item-gift");
            cartItemIsGiftElement.checked = cartItem.isGift;
            cartItemIsGiftElement.setAttribute("data-product-id", cartItem.id);
            cartItemIsGiftElement.addEventListener("change", handleGiftCheckboxChange);

            const cartItemPriceElement = cartItemElement.querySelector(".cart-item .cart-item-price");
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

            const cartItemQuantityElement = cartItemElement.querySelector(".cart-item-quantity");
            cartItemQuantityElement.value = cartItem.quantity;
            cartItemQuantityElement.setAttribute("data-product-id", cartItem.id);
            cartItemQuantityElement.addEventListener("change", handleQuantityChange);

            const cartItemDeleteElement = cartItemElement.querySelector(".cart-item-delete");
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
        return cartItem.isGift && cartItem.selected && cartItem.quantity > 0;
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
};

function handleSelectedCheckboxChange(event) {
    const cart = getCart();
    const cartItem = cart.find(cartItem => {
        return cartItem.id === event.target.dataset.productId;
    });
    cartItem.selected = event.target.checked;
    setCart(cart);
};

function handleGiftCheckboxChange(event) {
    const cart = getCart();
    const cartItem = cart.find(cartItem => {
        return cartItem.id === event.target.dataset.productId;
    });
    cartItem.isGift = event.target.checked;
    setCart(cart);
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
};

function handleCartItemDelete(event) {
    const cart = getCart();
    cart.splice(cart.findIndex(cartItem => {
        return cartItem.id === event.target.dataset.productId;
    }), 1);
    setCart(cart);
    removeCartItemElement(event.target.dataset.productId);
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
async function renderCheckoutButton(event) {
    const {
        cartItemQuantity,
    } = await calculateCartValues();
    
    if (cartItemQuantity === 0) {
        const button = document.getElementById("checkout-button");
        return button.disabled = true;
    } else {
        const button = document.getElementById("checkout-button");
        return button.disabled = false;
    };
};
