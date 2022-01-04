<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // if the email already exist in database:
    $statement = $database->prepare('SELECT email FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $compareEmail = $statement->fetch(PDO::FETCH_ASSOC);
    if ($compareEmail !== false) {
        $_SESSION['errors'][] = "Maybe try another email, this already exists!";
        redirect('/register.php');
    }

    //if the username already exists in database:
    $statement = $database->prepare('SELECT username FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $checkUsername = $statement->fetch(PDO::FETCH_ASSOC);
    if ($checkUsername !== false) {
        $_SESSION['errors'][] = "Maybe try another username, this already exists!";
        redirect('/register.php');
    }

    //add a new user in database:
    $statement = $database->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);

    $statement->execute();

    redirect('/');
}
