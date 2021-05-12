<?php
namespace Authorization;
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/jwt.php";

function getRequestAuthorizedUserId() {
    $accessToken = $_COOKIE["access_token"];
    if (empty($accessToken)) {
        return false;
    }
    $decoded = \JWT\decode($accessToken);
    if (empty($decoded)) {
        return false;
    }
    $accessTokenCsrfToken = $decoded->{"csrf-token"};
    if (empty($accessTokenCsrfToken)) {
        return false;
    }
    $requestHeaders = getallheaders();
    if (empty($requestHeaders["X-CSRF-TOKEN"])) {
        return false;
    }
    if ($accessTokenCsrfToken !== $requestHeaders["X-CSRF-TOKEN"]) {
        return false;
    }
    return $decoded->user_id;
};
?>