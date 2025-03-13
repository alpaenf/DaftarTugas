<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../models/Task.php";

$database = new Database();
$db = $database->getConnection();

$task = new Task($db);
$result = $task->readAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Daftar Tugas</h2>

    <table id="taskTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Username</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['title']); ?></td>
                    <td><?= htmlspecialchars($row['description']); ?></td>
                    <td><?= htmlspecialchars($row['username']); ?></td>
                    <td><?= htmlspecialchars($row['status']); ?></td>
                    <td>
                        <button class="mark-complete" data-id="<?= $row['id']; ?>">Selesai</button>
                        <button class="delete-task" data-id="<?= $row['id']; ?>">Hapus</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h3>Tambah Tugas Baru</h3>
    <form id="taskForm">
        <input type="text" name="title" placeholder="Judul Tugas" required>
        <input type="text" name="description" placeholder="Deskripsi" required>
        <input type="text" name="username" placeholder="Username" required>
        <button type="submit">Tambah Tugas</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>