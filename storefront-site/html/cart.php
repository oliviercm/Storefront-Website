<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/cart.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/header.php";?>
    <main>
        <div class="main-container">
            <div class="progress-container">
                <div class="progress-inner-container">
                    <div class="progress">
                        <div class="progress-cart">
                            <div class="progress-step">
                                <div>
                                    <span class="material-icons" style="color: #007600">check_box</span>
                                </div>
                                <div>
                                    <b>Review Cart</b>
                                </div>
                            </div>
                        </div>
                        <div class="progress-payment">
                            <div class="progress-step">
                                <div>
                                    <span class="material-icons" style="color: #C0C0C0">check_box_outline_blank</span>
                                </div>
                                <div>
                                    <b>Checkout</b>
                                </div>
                            </div>
                        </div>
                        <div class="progress-confirmation">
                            <div class="progress-step">
                                <div>
                                    <span class="material-icons" style="color: #C0C0C0">check_box_outline_blank</span>
                                </div>
                                <div>
                                    <b>Confirmation</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-container">
                <div class="cart" id="cart">
                    <h1>Shopping Cart</h1>
                    <span class="clickable-text deselect-all-button" style="font-size: 0.9em;">Deselect all items</span>
                    <div id="cart-legend-price">Price</div>
                    <hr>
                    <div id="cart-items">
    
                    </div>
                    <template id="cart-item-template">
                        <div class="cart-item">
                            <div class="cart-item-checkbox">
                                <div>
                                    <input class="cart-item-checkbox-input" type="checkbox" checked>
                                </div>
                            </div>
                            <div class="cart-item-image">
                                <img>
                            </div>
                            <div class="cart-item-main">
                                <a class="cart-item-link" href="./products/product.php?id=1" style="font-size: 1.1em;"></a>
                                <br>
                                <span class="cart-item-stock" style="font-size: 0.9em;"></span>
                                <br>
                                <span style="color: #707070; font-size: 0.8em;">Elligible for FREE shipping & <a href="./returns.php">FREE returns</a></span>
                                <br>
                                <input type="checkbox" class="cart-item-gift"><span style="font-size: 0.9em;">This is a gift </span><a href="./faq.php" style="font-size: 0.7em;">Learn more</a>
                                <br>
                                <select name="quantity" class="cart-item-quantity">
                                    <option value="0">Remove</option>
                                    <option value="1" selected>Qty: 1</option>
                                    <option value="2">Qty: 2</option>
                                    <option value="3">Qty: 3</option>
                                    <option value="4">Qty: 4</option>
                                    <option value="5">Qty: 5</option>
                                    <option value="6">Qty: 6</option>
                                    <option value="7">Qty: 7</option>
                                    <option value="8">Qty: 8</option>
                                    <option value="9">Qty: 9</option>
                                    <option value="10">Qty: 10</option>
                                    <option value="11">Qty: 11</option>
                                    <option value="12">Qty: 12</option>
                                    <option value="13">Qty: 13</option>
                                    <option value="14">Qty: 14</option>
                                    <option value="15">Qty: 15</option>
                                    <option value="16">Qty: 16</option>
                                    <option value="17">Qty: 17</option>
                                    <option value="18">Qty: 18</option>
                                    <option value="19">Qty: 19</option>
                                    <option value="20">Qty: 20</option>
                                </select>
                                <span style="color: #d0d0d0;">&nbsp;|&nbsp;</span> <span class="clickable-text cart-item-delete" style="font-size: 0.8em;">Delete</span>
                                <span style="color: #d0d0d0;">&nbsp;|&nbsp;</span> <a href="./cart.php" style="font-size: 0.8em;">Save for later</a>
                                <span style="color: #d0d0d0;">&nbsp;|&nbsp;</span> <a href="./cart.php" style="font-size: 0.8em;">Compare with similar items</a>
                            </div>
                            <div class="cart-item-price"></div>
                        </div>
                    </template>
                    <div style="width: 100%; text-align: right; font-size: 1.2em;">
                        Subtotal (<span class="cart-total-item-quantity"></span>): <b><span class="cart-subtotal"></span></b>
                    </div>
                </div>
            </div>
            <div class="subtotal-container">
                <div class="subtotal">
                    <span style="color: #007600; font-size: 0.9em;"><span class="material-icons">check_circle</span> Your order qualifies for FREE shipping.</span>
                    <br>
                    Subtotal (<span class="cart-total-item-quantity"></span>): <b><span class="cart-subtotal"></span></b>
                    <br>
                    <input type="checkbox" id="cart-gift"><span style="font-size: 0.9em;"> This order contains a gift
                    <br>
                    <a href="./checkout.php">
                        <button id="checkout-button" type="submit" class="submit-button">Proceed to checkout</button>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/footer.php";?>
    <script src="../scripts/render-cart.js" type="module"></script>
    <script src="../scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>