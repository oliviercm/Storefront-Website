<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/mysql.php";
$db = new MySQL();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $name = trim($_POST["name"]);
    $password = trim($_POST["password"]);
    $password_repeat = trim($_POST["password-repeat"]);
    if (empty($email) || empty($name) || empty($password) || empty($password_repeat)) {
        http_response_code(400);
        echo("Missing fields.");
        return;
    }
    try {
        $existing_user = $db->getUserByEmail($email);
        if (!empty($existing_user)) {
            http_response_code(400);
            echo("This email is already taken.");
            return;
        }
    } catch (\Throwable $e) {
        http_response_code(500);
        echo("Internal Server Error.");
        return;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo("Invalid email.");
        return;
    }
    if (strlen($password) < 6) {
        http_response_code(400);
        echo("Password must have at least 6 characters.");
        return;
    }
    if (strlen($password) > 64) { // Do not allow passwords longer than 64 for bcrypt
        http_response_code(400);
        echo("Password too long.");
        return;
    }
    if ($password !== $password_repeat) {
        http_response_code(400);
        echo("Passwords do not match.");
        return;
    }
    try {
        $db->createUser($email, $name, $password);
        http_response_code(200);
        echo("OK");
        return;
    } catch (\Throwable $e) {
        http_response_code(500);
        echo("Internal Server Error.");
        return;
    }
}
?>