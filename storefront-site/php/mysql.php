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

    public function getAllProducts() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM product");
            $stmt->execute();
            $products = $stmt->fetchAll();
            foreach ($products as &$product) {
                $product["description"] = json_decode($product["description"]); // Description column is stored as JSON string in DB
            }
            return $products;
        } catch (\Throwable $e) {
            throw $e;
        } 
    }

    public function getAllProductsJson() {
        try {
            $products = $this->getAllProducts();
            return json_encode($products);
        } catch (\Throwable $e) {
            throw $e;
        } 
    }

    public function getProductById(int $id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM product WHERE id=?");
            $stmt->execute([$id]);
            $product = $stmt->fetch();
            $product["description"] = json_decode($product["description"]); // Description column is stored as JSON string in DB
            return $product;
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function getProductJsonById(int $id) {
        try {
            $product = $this->getProductById($id);
            return json_encode($product);
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
?>