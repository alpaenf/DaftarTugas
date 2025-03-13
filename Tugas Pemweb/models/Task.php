<?php
require_once __DIR__ . "/../config/database.php";

class Task {
    private $conn;
    private $table_name = "tasks";

    public $id;
    public $title;
    public $description;
    public $username;
    public $status;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE: Tambah tugas baru
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (title, description, username, status) 
                  VALUES (:title, :description, :username, 'pending')";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":username", $this->username);

        return $stmt->execute();
    }

    // READ: Ambil semua tugas
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // UPDATE: Tandai tugas selesai
    public function updateStatus() {
        $query = "UPDATE " . $this->table_name . " SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // DELETE: Hapus tugas
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }
}
?>
