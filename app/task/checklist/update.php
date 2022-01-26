<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

//in this file, we update the checklist items' completed_at value in the database

$user_id = $_SESSION['user']['id'];
$task_id = $_GET['task_id'];
$id = $_GET['id'];

if (isset($_POST['checkbox'])) {
    $completed_at = date('Y-m-d');
    echo 'checked!';
} else {
    $completed_at = null;
    echo 'unchecked!';
}

$statement = $database->prepare('UPDATE checklists SET completed_at = :completed_at
WHERE id = :id AND task_id = :task_id AND user_id = :user_id');
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
$statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$statement->bindParam(':completed_at', $completed_at, PDO::PARAM_STR);

$statement->execute();

redirect('/edit_task.php?id=' . $task_id);
