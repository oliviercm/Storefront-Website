<?php
namespace namechange;
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/authorize.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/mysql.php";


echo \Authorization\getRequestAuthorizedUserId();

/*
if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    try {
        $db = new MySQL();

        $db->editUserName($name);

    } catch(\Throwable $e) {
        http_response_code(500);
        echo("Internal server error.");
        return;
    }
}
*/

?>