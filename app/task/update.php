<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$task_id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$list_id = $GET['task_id'];

//here we update tasks


//deadline
if (isset($_POST['deadline'])) {
    $deadline = $_POST['deadline'];
}

if ($deadline) {
    $statement = $database->prepare('UPDATE tasks SET deadline_at = :deadline_at WHERE id = :id AND user_id = :user_id');

    $statement->bindParam(':deadline_at', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();
}

//title

if (isset($_POST['listTitle'])) {
    $trim_title = trim($_POST['listTitle']);
    $listTitle = filter_var($trim_title, FILTER_SANITIZE_STRING);
}
if ($listTitle) {
    $statement = $database->prepare('UPDATE tasks SET title = :title WHERE id = :id AND user_id = :user_id');

    $statement->bindParam(':title', $listTitle, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();
}

//content

if (isset($_POST['content'])) {
    $trim_content = trim($_POST['content']);
    $content = filter_var($trim_content, FILTER_SANITIZE_STRING);
}
if ($title) {
    $statement = $database->prepare('UPDATE tasks SET content = :content WHERE id = :id AND user_id = :user_id');

    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();
}

redirect('/');
