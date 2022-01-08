<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['list_id'])) {
    $list_id = $_POST['list_id'];

    $statement = $database->prepare('DELETE FROM tasks WHERE list_id = :list_id');
    $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->prepare('DELETE FROM lists WHERE id = :id');
    $statement->bindParam(':id', $listId, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/');
