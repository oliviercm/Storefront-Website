<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/mysql.php";

function respondJson($json) {
    http_response_code(200);
    header("Content-Type: application/json");
    print_r($json);
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (empty($_GET["id"])) { // No ID specified - fetch all products
        try {
            $db = new MySQL();
            $products = $db->getAllProductsJson();
            respondJson($products);
        } catch (\Throwable $e) {
            http_response_code(500);
        }
    } else if (!is_numeric($_GET["id"])) {
        http_response_code(400);
        echo("Error: Invalid product ID.");
    } else { // Specific product ID specified - fetch specific product
        try {
            $db = new MySQL();
            $product = $db->getProductJsonById($_GET["id"]);
            if ($product === "false") {
                http_response_code(404);
                echo("Error: Product not found.");
            } else {
                respondJson($product);
            };
        } catch (\Throwable $e) {
            http_response_code(500);
        }
    }
}
?>