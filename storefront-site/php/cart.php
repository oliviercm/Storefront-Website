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
        
        $userCart = $db->getUserCart($authorizedUserId);
        $responseBody = [
            "cart" => ((!$userCart["cart"]) ? "[]" : $userCart["cart"])
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
} else if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    try {
        if (strcasecmp($_SERVER["CONTENT_TYPE"], "application/x-www-form-urlencoded") !== 0) {
            http_response_code(415);
            return;
        }

        $db = new MySQL();

        $authorizedUserId = \Authorization\getRequestAuthorizedUserId();
        if (empty($authorizedUserId)) {
            http_response_code(401);
            echo("Unauthorized.");
            return;
        }

        parse_str(file_get_contents("php://input"), $requestBody);
        $newCart = $requestBody["cart"];
        if (empty($newCart)) {
            http_response_code(400);
            echo("Missing field.");
            return;
        }

        try {
            $db->setUserCart($authorizedUserId, $newCart);
            http_response_code(200);
            return;
        } catch(\Throwable $e) {
            http_response_code(400);
            echo("Invalid cart.");
            return;
        }
    } catch(\Throwable $e) {
        http_response_code(500);
        echo("Internal server error.");
        return;
    }
}
?>