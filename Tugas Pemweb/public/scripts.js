$(document).ready(function() {
    $('#taskTable').DataTable();

    $("#taskForm").submit(function(e) {
        e.preventDefault();
        $.post("add_task.php", $(this).serialize(), function(response) {
            alert(response);
            location.reload();
        });
    });

    $(".mark-complete").click(function() {
        let taskId = $(this).data("id");
        $.post("update_task.php", { id: taskId, status: "completed" }, function(response) {
            location.reload();
        });
    });

    $(".delete-task").click(function() {
        let taskId = $(this).data("id");
        $.post("delete_task.php", { id: taskId }, function(response) {
            location.reload();
        });
    });
});