<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['email'])) {
    $trimmed_email = trim($_POST['email']);
    $email = filter_var($trimmed_email, FILTER_SANITIZE_EMAIL);
    $user_id = $_SESSION['user']['id'];

    //to check if email already exists:
    $statement = $database->prepare('SELECT email FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $compareEmail = $statement->fetch(PDO::FETCH_ASSOC);

    if ($compareEmail) {
        $_SESSION['errors'] = "Maybe try another email address, this one already exists.";
        redirect('/profile.php');
    }

    //to change the email
    $statement = $database->prepare('UPDATE users SET email = :email WHERE id = :user_id');
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
}
