<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $trimmed_email = trim($_POST['email']);
    $email = filter_var($trimmed_email, FILTER_SANITIZE_EMAIL);
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}

$statement = $database->prepare('SELECT email FROM users WHERE email = :email');
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->execute();
$compareEmail = $statement->fetch(PDO::FETCH_ASSOC);
if ($compareEmail) {
    $_SESSION['errors'][] = "Maybe try another email, this already exists!";
    redirect('/register.php');
}

redirect('/');
