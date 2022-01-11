<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$task_id = $_GET['id'];
$user_id = $_SESSION['user']['id'];

//deadline
if (isset($_POST['deadline'])) {
    $deadline = $_POST['deadline'];
}

if ($deadline) {
    $statement = $database->prepare('UPDATE tasks SET deadline_at = :deadline_at WHERE id = :id AND user_id = :user_id');

    $statement->bindParam(':deadline_at', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();
}


redirect('/');
