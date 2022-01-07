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

    //check the old password
    if (password_verify($_POST['password'], $user['password'])) {
        $hashed_new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        //now we change the password in database
        $statement = $database->prepare('UPDATE users SET password = :new_password WHERE id = :id');
        $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':new_password', $hashed_new_password, PDO::PARAM_STR);

        $statement->execute();
    }
    redirect('/profile.php');
}
