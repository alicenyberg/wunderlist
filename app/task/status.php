<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$user_id = $_SESSION['user']['id'];
$task_id = $_GET['id'];

// completed and uncompleted task here

if ($_POST['status'] == "completed") {
    $completed_at = date('Y-m-d');

    $statement = $database->prepare('UPDATE tasks SET completed_at = :completed_at WHERE id = :id AND user_id = :user_id');
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':completed_at', $completed_at, PDO::PARAM_STR);

    $statement->execute();
} else {
    $statement = $database->prepare('UPDATE tasks SET completed_at = null WHERE id = :id AND user_id = :user_id');
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);

    $statement->execute();
}
redirect('/tasks.php');
