<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/authorize.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/php/mysql.php";

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

public function editUserName(string $name){
try{
    $user_stmt = $this->conn->prepare("INSERT INTO `storefront`.`user` (`name`)");
}
catch (\Throwable $e) {
        $this->conn->rollBack();
        throw $e;
}
}
?>