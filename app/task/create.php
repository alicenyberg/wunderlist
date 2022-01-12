<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// here we insert new tasks to the database

if (isset($_POST['title'], $_POST['deadline'], $_POST['content'])) {
    $list_id = $_GET['id'];
    $title = trim($_POST['title']);
    $deadline = $_POST['deadline'];
    $content = trim($_POST['content']);
    $user_id = $_SESSION['user']['id'];
    $created = date('Y-m-d');

    $statement = $database->prepare('INSERT INTO tasks (list_id, user_id, title, content, completed_at, created_at) VALUES (:list_id, :user_id, :title, :content, :completed_at, created_at)');
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':completed_at', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':created_at', $created, PDO::PARAM_INT);
}
redirect('/');
