<?php
require_once "../config/database.php";
require_once "../models/Task.php";

$database = new Database();
$db = $database->getConnection();

$task = new Task($db);
$task->title = $_POST['title'];
$task->description = $_POST['description']; // ✅ Tambahkan titik koma di akhir baris
$task->username = $_POST['username'];

if ($task->create()) {
    echo "Tugas berhasil ditambahkan!";
} else {
    echo "Gagal menambahkan tugas.";
}
?>
