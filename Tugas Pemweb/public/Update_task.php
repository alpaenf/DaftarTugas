<?php
require_once "../config/database.php";
require_once "../models/Task.php";

$database = new Database();
$db = $database->getConnection();

$task = new Task($db);

// Check if a POST request is made with the task ID and status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
    $task->id = $_POST['id']; // Set the task ID
    $task->status = $_POST['status']; // Set the new status
    if ($task->updateStatus()) {
        echo json_encode(["message" => "Task status updated successfully."]);
    } else {
        echo json_encode(["message" => "Unable to update task status."]);
    }
    exit; // Exit after handling the request
}

// If not a POST request, redirect or show an error
header("Location: ../public/Update_task.php");
exit;
?>