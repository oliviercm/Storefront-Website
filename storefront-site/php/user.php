<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/authorize.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/mysql.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $db = new MySQL();

        $authorizedUserId = Authorization\getRequestAuthorizedUserId();
        if (empty($authorizedUserId)) {
            http_response_code(401);
            echo("Unauthorized.");
            return;
        }
        $response_body = [
            "user" => $db->getUserObject($authorizedUserId)
        ];
        http_response_code(200);
        header("Content-Type: application/json");
        echo(json_encode($response_body));
    } catch(\Throwable $e) {
        http_response_code(500);
        echo("Internal server error.");
        return;
    }
}
?>