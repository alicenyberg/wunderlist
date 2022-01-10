<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['id'])) {
    $title = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $statement = $database->prepare('DELETE FROM lists WHERE id = :id');
    $statement->bindParam(':id', $title, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/');
