<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/mysql.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (empty($_GET["id"])) {
        http_response_code(400);
        echo("Error: No product ID specified.");
    } else if (!is_numeric($_GET["id"])) {
        http_response_code(400);
        echo("Error: Invalid product ID.");
    } else {
        try {
            $db = new MySQL();
            $product = $db->getProductJsonById($_GET["id"]);
            if ($product === "false") {
                http_response_code(404);
                echo("Error: Product not found.");
            } else {
                http_response_code(200);
                header("Content-Type: application/json");
                echo($product);
            };
        } catch (\Throwable $e) {
            http_response_code(500);
        }
    }
}
?>