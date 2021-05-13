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
        $newsletter = $requestBody->email_newsletter_subscribed;
        $promotions = $requestBody->email_promotions_subscribed;
        $reminders = $requestBody->email_reminders_subscribed;

        if ((gettype($newsletter) !== "boolean") || (gettype($promotions) !== "boolean") || (gettype($reminders) !== "boolean")) {
            http_response_code(400);
            echo("Missing fields.");
            return;
        }

        $db->updateUserEmailPreferences($authorizedUserId, $newsletter, $promotions, $reminders);
        
        http_response_code(200);
        return;
    } catch(\Throwable $e) {
        http_response_code(500);
        echo("Internal server error.");
        return;
    }
}
?>