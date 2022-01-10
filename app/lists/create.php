<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['title'])) {
    $user_id = $_SESSION['user']['id'];
    $trim_title = trim($_POST['title']);
    $title = filter_var($trim_title, FILTER_SANITIZE_STRING);

    $statement = $database->prepare('INSERT INTO lists (title, user_id) VALUES (:title, :user_id)');
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/lists.php');
