<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}


function logged_in()
{
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        return $user;
    }
}

function get_all_lists(object $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT * from lists WHERE user_id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $lists = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $lists;
}


function get_tasks(PDO $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT tasks.id, tasks.list_id, tasks.user_id, tasks.content, tasks.title, tasks.deadline_at, tasks.completed_at, lists.title AS list_title FROM tasks INNER JOIN lists ON tasks.list_id = lists.id WHERE tasks.user_id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}

function get_tasks_list(PDO $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT * from tasks WHERE user_id = :user_id AND list_id = :list_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}

function get_image(PDO $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT image_url FROM users WHERE id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $image = $statement->fetch(PDO::FETCH_ASSOC);
    $image_url = $image['image_url'];

    if ($image_url === null) {
        return '/uploads/placeholder.jpg';
    }

    return 'uploads/' . $image_url;
}
