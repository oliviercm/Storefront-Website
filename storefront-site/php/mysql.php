<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/dotenv.php";

class MySQL {
    protected $conn;

    public function __construct() {
        $host = getenv("MYSQL_HOST");
        $database = getenv("MYSQL_DATABASE");
        $port = getenv("MYSQL_PORT");
        $username = getenv("MYSQL_USERNAME");
        $password = getenv("MYSQL_PASSWORD");

        $this->conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function getProductById(int $id) {
        $stmt = $this->conn->prepare("SELECT * FROM product WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getProductJsonById(int $id) {
        $stmt = $this->conn->prepare("SELECT * FROM product WHERE id=?");
        $stmt->execute([$id]);
        return json_encode($stmt->fetch());
    }
}
?>