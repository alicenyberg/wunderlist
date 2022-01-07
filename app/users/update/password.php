<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

//here we change the users password

if (isset($_POST['password'], $_POST['new_password'])) {
    $user_id = $_SESSION['user']['id'];

    //get the user from database
    $statement = $database->prepare('SELECT * FROM users WHERE id = :id');
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
}
