<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//in this file we complete all tasks in a list
if (isset($_GET['list_id'])) {
    $user_id = $_SESSION['user']['id'];
    $id = $_GET['list_id'];
    $completed_at = date('Y-m-d');

    $statement = $database->prepare('UPDATE tasks SET completed_at = :completed_at WHERE list_id = :list_id AND user_id = :user_id');
    $statement->bindParam(':completed_at', $completed_at, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();
}
redirect('/overview.php');
