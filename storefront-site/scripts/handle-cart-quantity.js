import{
calculateCartValues,
} from "./util-cart.js"

(async () => {
    try {
        headerCartVal();
    } catch(e) {
        console.error(e);
    };
})();


async function headerCartVal(){
const {
    cartItemQuantity,
} = await calculateCartValues();

const cartItemTotals = document.getElementsByClassName("cart-total");
 for (const cartItemTotal of cartItemTotals){
    cartItemTotal.textContent = cartItemQuantity;
 };
};