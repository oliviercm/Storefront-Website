// Load test data.
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
    await renderCartItems();
    await renderTotalCartValues();
};

async function renderCartItems() {
    const cart = getCart();
    const products = await getProducts();

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

            const cartItemDeleteElement = cartItemElement.querySelectorAll(".cart-item-delete")[0];
            cartItemDeleteElement.setAttribute("data-product-id", cartItem.id);
            
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

function calculateTotalCartValues(products, cart) {
    let totalCartPrice = 0;
    let totalItemQuantity = 0;
    for (const cartItem of cart) {
        if (cartItem.selected) {
            const product = products.find(product => {
                return product.id === cartItem.id;
            });
            const productPrice = product.discount_price.usd || product.price.usd;
            const productQuantity = cartItem.quantity;
            totalCartPrice += productPrice * productQuantity;
            totalItemQuantity += productQuantity;
        };
    };
    return {
        totalCartPrice,
        totalItemQuantity,
    };
};

async function renderTotalCartValues() {
    const cart = getCart();
    const products = await getProducts();

    // Calculate and set subtotal text (total quantity, total price)
    const {
        totalCartPrice,
        totalItemQuantity,
    } = calculateTotalCartValues(products, cart);
    const cartSubtotalItemQuantityElements = document.getElementsByClassName("total-cart-item-quantity");
    for (const itemQuantityElement of cartSubtotalItemQuantityElements) {
        itemQuantityElement.textContent = totalItemQuantity;
    };
    const cartSubtotalTotalPriceElements = document.getElementsByClassName("total-cart-subtotal");
    for (const itemSubtotalElement of cartSubtotalTotalPriceElements) {
        itemSubtotalElement.textContent = totalCartPrice.toFixed(2);
    };

    // Check the "This order contains a gift" checkbox if necessary
    const cartContainsGiftElement = document.getElementById("cart-gift");
    cartContainsGiftElement.checked = cart.some(cartItem => {
        return cartItem.isGift;
    });
};

function handleQuantityChange(event) {
    const cart = getCart();
    const changedCartItem = cart.find(cartItem => {
        return cartItem.id === event.target.dataset.productId;
    });
    changedCartItem.quantity = Number(event.target.value);
    setCart(cart);
    updateCartItem(changedCartItem.id);
    renderTotalCartValues();
};

async function updateCartItem(productId) {
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
};

function handleSelectedCheckboxChange(event) {
    const cart = getCart();
    const cartItem = cart.find(cartItem => {
        return cartItem.id === event.target.dataset.productId;
    });
    cartItem.selected = event.target.checked;
    setCart(cart);
    renderTotalCartValues();
};

function handleGiftCheckboxChange(event) {
    const cart = getCart();
    const cartItem = cart.find(cartItem => {
        return cartItem.id === event.target.dataset.productId;
    });
    cartItem.isGift = event.target.checked;
    setCart(cart);
    renderTotalCartValues();
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

async function getProducts() {
    const response = await fetch("/mock-data/products.json"); // This will be replaced with an actual API call.
    if (response.status < 200 || response.status >= 300) {
        throw Error(response.statusText);
    };
    const products = await response.json();
    return products;
};

async function getProductById(id) {
    const products = await getProducts();
    return products.find(product => {
        return product.id === id;
    });
};

function getCart() {
    return JSON.parse(sessionStorage.getItem("cart"));
};

function setCart(cart) {
    sessionStorage.setItem("cart", JSON.stringify(cart));
};

function getCartItemById(id) {
    const cart = getCart();
    return cart.find(cartItem => {
        return cartItem.id === id;
    });
};