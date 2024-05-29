<?php
class DataKontak {
    private $host = "localhost";
    private $db_name = "portofolio";
    private $username = "root"; // Sesuaikan dengan username MySQL Anda
    private $password = ""; // Sesuaikan dengan password MySQL Anda
    public $conn;

    public function __construct() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }

    public function insertMessage($name, $email, $subject, $message) {
        try {
            $query = "INSERT INTO datapesan (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
            $stmt = $this->conn->prepare($query);

            // Bind parameters
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":subject", $subject);
            $stmt->bindParam(":message", $message);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (PDOException $exception) {
            echo "Insert error: " . $exception->getMessage();
        }
    }
}?>
