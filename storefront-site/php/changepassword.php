<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/authorize.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/mysql.php";

if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    try {
        $authorizedUserId = \Authorization\getRequestAuthorizedUserId();
        if (empty($authorizedUserId)) {
            http_response_code(401);
            echo("Unauthorized.");
            return;
        }

        if (strcasecmp($_SERVER["CONTENT_TYPE"], "application/json") !== 0) {
            http_response_code(415);
            return;
        }

        $db = new MySQL();

        $requestBody = json_decode(file_get_contents("php://input"));
        $currentPassword = trim($requestBody->current_password);
        $newPassword = trim($requestBody->new_password);
        $repeatPassword = trim($requestBody->repeat_password);

        if (empty($currentPassword) || empty($newPassword) || empty($repeatPassword)) {
            http_response_code(400);
            echo("Missing fields.");
            return;
        }

        if (strlen($newPassword) < 6) {
            http_response_code(400);
            echo("Password must have at least 6 characters.");
            return;
        }
        if (strlen($newPassword) > 64) { // Do not allow passwords longer than 64 for bcrypt
            http_response_code(400);
            echo("Password too long.");
            return;
        }
        if ($newPassword !== $repeatPassword) {
            http_response_code(400);
            echo("Passwords do not match.");
            return;
        }

        $currentPasswordValid = $db->verifyUserPassword($authorizedUserId, $currentPassword);

        if (!$currentPasswordValid) {
            http_response_code(401);
            echo("Wrong password.");
            return;
        } else {
            $db->updateUserPassword($authorizedUserId, $newPassword);
            http_response_code(200);
            return;
        }
    } catch(\Throwable $e) {
        http_response_code(500);
        echo("Internal server error.");
        return;
    }
}
?>