<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// here we insert new tasks to the database

if (isset($_POST['title'], $_POST['deadline'], $_POST['content'])) {
    $list_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];
    $trim_title = trim($_POST['title']);
    $title = filter_var($trim_title, FILTER_SANITIZE_STRING);
    $trim_content = trim($_POST['content']);
    $content = filter_var($trim_content, FILTER_SANITIZE_STRING);
    $deadline_at = $_POST['deadline'];
    $created_at = date('Y-m-d');

    $statement = $database->prepare('INSERT INTO tasks (user_id, list_id, title, content, created_at, deadline_at)
    VALUES
    (:user_id, :list_id, :title, :content, :created_at, :deadline_at)');

    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':created_at', $created_at, PDO::PARAM_STR);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);

    $statement->execute();
}
redirect('/tasks.php');
