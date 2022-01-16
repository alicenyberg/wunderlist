<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$list_id = $_GET['id'];
$user_id = $_SESSION['user']['id'];


if (isset($_POST['title'])) {
    $trim_title = trim($_POST['title']);
    $title = filter_var($trim_title, FILTER_SANITIZE_STRING);

    $statement = $database->prepare("UPDATE lists SET title = :title WHERE id = :id AND user_id = :user_id");
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
}
redirect('/lists.php');
