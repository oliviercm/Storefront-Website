/**
 * This script dynamically renders the cart page.
 */
(async () => {
    try {
        // Load test data
        sessionStorage.setItem("cart", JSON.stringify([{
            id: "2",
            quantity: 1,
            checked: true,
            isGift: false,
        }, {
            id: "12",
            quantity: 2,
            checked: true,
            isGift: false,
        }, {
            id: "4",
            quantity: 3,
            checked: false,
            isGift: true,
        }]));
        const cart = JSON.parse(sessionStorage.getItem("cart"));
        
        /**
         * Fetch and find specific product data.
         */
        const response = await fetch("/mock-data/products.json"); // This will be replaced with an actual API call.
        if (response.status < 200 || response.status >= 300) {
            throw Error(response.statusText);
        };
        const products = await response.json();

        /**
         * Render cart items using template.
         */
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
    
                const cartItemCheckboxElement = cartItemElement.querySelectorAll(".cart-item-checkbox input[type=checkbox]")[0];
                cartItemCheckboxElement.checked = cartItem.checked;

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

                const cartItemPriceElement = cartItemElement.querySelectorAll(".cart-item .cart-item-price")[0];
                const originalPriceSpan = document.createElement("span");
                originalPriceSpan.appendChild(document.createTextNode(`$${item.price.usd}`));
                cartItemPriceElement.appendChild(originalPriceSpan);
                // If there is a discounted price, strikethrough the original price and append the discounted price.
                if (item.discount_price.usd) {
                    originalPriceSpan.style.setProperty("text-decoration", "line-through");
                    const discountedPriceSpan = document.createElement("span");
                    discountedPriceSpan.appendChild(document.createTextNode(`$${item.discount_price.usd}`));
                    cartItemPriceElement.appendChild(document.createTextNode("\u00A0"));
                    cartItemPriceElement.appendChild(discountedPriceSpan);
                };

                const cartItemQuantityElement = cartItemElement.querySelectorAll(".cart-item-quantity")[0];
                cartItemQuantityElement.value = cartItem.quantity;
                
                //Insert the cart item and a horizontal rule
                cartItemsElement.appendChild(cartItemElement);
                cartItemsElement.appendChild(document.createElement("hr"));
            } catch(e) {
                console.error(e);
            };
        };

        /**
         * Calculate and set subtotal text (total quantity, total price)
         */
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
            itemSubtotalElement.textContent = totalCartPrice;
        };

        /**
         * Check the "This order contains a gift" checkbox if necessary
         */
        const cartContainsGiftElement = document.getElementById("cart-gift");
        cartContainsGiftElement.checked = cart.some(cartItem => {
            return cartItem.isGift;
        });
    } catch(e) {
        console.error(e);
    };
})();

function calculateTotalCartValues(products, cart) {
    let totalCartPrice = 0;
    let totalItemQuantity = 0;
    for (const cartItem of cart) {
        const product = products.find(product => {
            return product.id === cartItem.id;
        });
        const productPrice = product.discount_price.usd || product.price.usd;
        const productQuantity = cartItem.quantity;
        totalCartPrice += productPrice * productQuantity;
        totalItemQuantity += productQuantity;
    };
    return {
        totalCartPrice,
        totalItemQuantity,
    };
};