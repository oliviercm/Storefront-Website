<?php
namespace JWT;

function generate($payload) {
    $secret = getenv("JWT_SECRET");
    $expire_time = getenv("JWT_EXPIRE_TIME");
    $payload = array_merge($payload, [
        "iat" => time(),
        "exp" => time() + $expire_time
    ]);
    if (empty($secret)) {
        throw new \Exception("No secret configured.");
    }
    if (empty($expire_time)) {
        throw new \Exception("No JWT expire time configured.");
    }

    $header = json_encode([
        "typ" => "JWT",
        "alg" => "HS256"
    ]);
    $encoded_payload = json_encode($payload);
    $base64UrlHeader = str_replace(["+", "/", "="], ["-", "_", ""], base64_encode($header));
    $base64UrlPayload = str_replace(["+", "/", "="], ["-", "_", ""], base64_encode($encoded_payload));
    $signature = hash_hmac("sha256", $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
    $base64UrlSignature = str_replace(["+", "/", "="], ["-", "_", ""], base64_encode($signature));
    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

    return $jwt;
}
?>