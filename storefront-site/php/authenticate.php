<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/dotenv.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/jwt.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/mysql.php";

$db = new MySQL();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        if (empty($email) || empty($password)) {
            http_response_code(400);
            echo("Missing fields.");
            return;
        }

        $authenticatedUser = $db->authenticateUser($email, $password);
        if (empty($authenticatedUser)) {
            http_response_code(401);
            echo("Invalid credentials.");
            return;
        }

        $jwt = JWT\encode([
            "user_id" => $authenticatedUser["id"]
        ]);
        $response_body = json_encode([
            "access_token" => $jwt,
            "token_type" => "Bearer",
            "expires_in" => (int)getenv("JWT_EXPIRE_TIME")
        ]);
        http_response_code(200);
        header("Content-Type: application/json");
        echo($response_body);
        return;
    } catch (\Throwable $e) {
        http_response_code(500);
        echo("Internal server error.");
        return;
    }
}
?>