<?php
class Database {
    private $host = "localhost"; // Sesuaikan dengan server kamu
    private $db_name = "todo_list"; // Sesuai dengan database yang kita buat
    private $username = "root"; // Ubah jika MySQL kamu punya user lain
    private $password = ""; // Kosongkan jika tidak ada password
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
