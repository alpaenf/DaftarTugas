<?php
require_once "config/database.php";

class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $email;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE: Tambah user baru
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (username, email) VALUES (:username, :email)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);

        return $stmt->execute();
    }

    // READ: Ambil semua user
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // DELETE: Hapus user
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }
}
?>
