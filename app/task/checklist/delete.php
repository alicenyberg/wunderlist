<?php

declare(strict_types=1);

//in this file, we delete checklist items

require __DIR__ . '/../../autoload.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $task_id = $_GET['task_id'];
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare('DELETE FROM checklists WHERE task_id = :task_id AND id = :id AND user_id = :user_id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/edit_task.php?id=' . $task_id);
