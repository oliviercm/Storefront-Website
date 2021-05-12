<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/mysql.php";
$db = new MySQL();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newsletter = trim($_POST["newsletter"]);
    $promotions = trim($_POST["promotions"]);
    $reminders = trim($_POST["reminders"]);

    try {

        $authorizedUserId = Authorization\getRequestAuthorizedUserId();
        if (empty($authorizedUserId)) {
            http_response_code(401);
            echo("Unauthorized.");
            return;
        }

        $db->updateUserPreference($newsletter, $promotions, $reminders, $authorizedUserId);
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