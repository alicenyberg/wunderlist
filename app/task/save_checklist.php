<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// in this file, we save checklists as arrays converted to strings in the database

// add parent_id column in database, set it to null by default. Add subtasks to database one by one and link them to the right task with parent_id.
// Display them on the edit_task page and add checkbox for completed task

if (isset($_POST['checklist-item'])) {

    print_r($_POST['checklist-item']);
    foreach ($_POST['checklist-item'] as $checklist_item) {
        echo $checklist_item;
        $task_id = $_GET['id'];
        $user_id = $_SESSION['user']['id'];
        $content = filter_var(trim($checklist_item), FILTER_SANITIZE_STRING);

        $statement = $database->prepare('INSERT INTO tasks (user_id, title, content, created_at, deadline_at)
    VALUES
    (:user_id, :list_id, :title, :content, :created_at, :deadline_at)');
    }



    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':created_at', $created_at, PDO::PARAM_STR);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);

    $statement->execute();
}
