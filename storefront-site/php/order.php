<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/authorize.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/mysql.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $db = new MySQL();

        $authorizedUserId = \Authorization\getRequestAuthorizedUserId();
        if (empty($authorizedUserId)) {
            http_response_code(401);
            echo("Unauthorized.");
            return;
        }
        
        $orders = $db->getUserOrders($authorizedUserId);
        $responseBody = [
            "orders" => $orders
        ];
        http_response_code(200);
        header("Content-Type: application/json");
        echo(json_encode($responseBody));
        return;
    } catch(\Throwable $e) {
        http_response_code(500);
        echo("Internal server error.");
        return;
    }
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        if (strcasecmp($_SERVER["CONTENT_TYPE"], "application/json") !== 0) {
            http_response_code(415);
            return;
        }

        $authorizedUserId = \Authorization\getRequestAuthorizedUserId();
        if (empty($authorizedUserId)) {
            http_response_code(401);
            echo("Unauthorized.");
            return;
        }

        $requestBody = json_decode(file_get_contents("php://input"), true);

        if (empty($requestBody["cart"]) || empty($requestBody["shipping_address"]) || empty($requestBody["billing_address"])) {
            http_response_code(400);
            echo("Missing fields.");
            return;
        }

        $db = new MySQL();

        $cart = $requestBody["cart"];
        $totalPrice = 0;
        foreach ($cart as $cartItem) {
            $product = $db->getProductById($cartItem["id"]);
            $productQuantity = $cartItem["quantity"];
            $productPrice = (!$product["discount_price"]) ? $product["price"] : $product["discount_price"];
            $totalPrice += $productPrice * $productQuantity;
        }
        
        $shippingAddress = $requestBody["shipping_address"];
        $billingAddress = $requestBody["billing_address"];

        $db->createUserOrder($authorizedUserId, $cart, $totalPrice, $shippingAddress, $billingAddress);
    } catch(NegativeStockException $e) {
        http_response_code(422);
        echo("Not enough stock.");
        return;
    } catch(\Throwable $e) {
        http_response_code(500);
        echo("Internal server error.");
        return;
    }
}
?>