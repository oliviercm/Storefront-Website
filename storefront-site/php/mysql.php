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
                if (!empty($product)) {
                    $product["description"] = json_decode($product["description"]); // Description column is stored as JSON string in DB
                }
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
            if (!empty($product)) {
                $product["description"] = json_decode($product["description"]); // Description column is stored as JSON string in DB
            }
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

    public function getUserByEmail(string $email) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE email=?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            return $user;
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function createUser(string $email, string $name, string $password) {
        try {
            $this->conn->beginTransaction();

            $user_stmt = $this->conn->prepare("INSERT INTO `storefront`.`user` (`email`, `name`) VALUES (?, ?)");
            $user_stmt->execute([$email, $name]);

            $user_id = $this->conn->lastInsertId();

            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $user_password_stmt = $this->conn->prepare("INSERT INTO `storefront`.`user_password` (`user_id`, `hash`) VALUES (?, ?)");
            $user_password_stmt->execute([$user_id, $password_hash]);

            $user_preference_stmt = $this->conn->prepare("INSERT INTO `storefront`.`user_preference` (`user_id`) VALUES (?)");
            $user_preference_stmt->execute([$user_id]);

            $this->conn->commit();
        } catch (\Throwable $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }

    public function authenticateUser(string $email, string $password) {
        try {
            $user_stmt = $this->conn->prepare("SELECT * FROM user WHERE email=?");
            $user_stmt->execute([$email]);
            $user = $user_stmt->fetch();

            if (empty($user)) {
                return false;
            }

            $user_id = $user["id"];

            $password_stmt = $this->conn->prepare("SELECT hash FROM user_password WHERE user_id=?");
            $password_stmt->execute([$user_id]);
            $password_hash = $password_stmt->fetch();

            if (empty($password_hash)) {
                return false;
            }

            $hash = $password_hash["hash"];

            $verified = password_verify($password, $hash);

            if (!$verified) {
                return false;
            }

            return $user;
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function getUserObject(int $userId) {
        try {
            $user_stmt = $this->conn->prepare("SELECT * FROM user WHERE id=?");
            $user_stmt->execute([$userId]);
            $user = $user_stmt->fetch();
            $cleaned_user = array_intersect_key($user, [
                "email" => true,
                "name" => true
            ]);

            $user_preference_stmt = $this->conn->prepare("SELECT * FROM user_preference WHERE user_id=?");
            $user_preference_stmt->execute([$userId]);
            $user_preference = $user_preference_stmt->fetch();
            $cleaned_user_preference = array_intersect_key($user_preference, [
                "email_newsletter_subscribed" => true,
                "email_promotions_subscribed" => true,
                "email_reminders_subscribed" => true
            ]);

            return array_merge($cleaned_user, [
                "preferences" => $cleaned_user_preference
            ]);
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function getUserCart(int $userId) {
        try {
            $cart_stmt = $this->conn->prepare("SELECT cart FROM user_cart WHERE user_id=?");
            $cart_stmt->execute([$userId]);
            $cart = $cart_stmt->fetch();

            return $cart;
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function setUserCart(int $userId, string $cart) {
        try {
            $cart_stmt = $this->conn->prepare("INSERT INTO user_cart (user_id, cart) VALUES (:userId,:cart) ON DUPLICATE KEY UPDATE cart = :cart");
            $success = $cart_stmt->execute([
                "userId" => $userId,
                "cart" => $cart
            ]);

            return $success;
        } catch (\Throwable $e) {
            throw $e;
        }
    }
/*
    public function editUserName(string $name){
        try{
            getRequestAuthorizedUserId();
    
            $user_stmt = $this->conn->prepare("UPDATE INTO `storefront`.`user` (`name`)");
        } catch (\Throwable $e) {
            throw $e;
        }

    }
    */
}
?>