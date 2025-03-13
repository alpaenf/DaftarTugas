<?php
require_once "../config/database.php";
require_once "../models/Task.php";

$database = new Database();
$db = $database->getConnection();

$task = new Task($db);

// Check if a POST request is made with the task ID
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $task->id = $_POST['id']; // Set the task ID
    if ($task->delete()) {
        echo json_encode(["message" => "Task deleted successfully."]);
    } else {
        echo json_encode(["message" => "Unable to delete task."]);
    }
    exit; // Exit after handling the request
}

// If not a POST request, redirect or show an error
header("Location: ../public/Delete_task.php");
exit;
?>
