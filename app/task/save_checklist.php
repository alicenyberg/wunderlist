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
        // if (checkbox is checked = completed_at date Y-m-d ELSE completed_at = null) {
        //     # code...
        // }
        // $completed_at =

        $statement = $database->prepare('INSERT INTO checklists (user_id, task_id, content, completed_at)
        VALUES
        (:user_id, :task_id, :content,:completed_at)');
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
        $statement->bindParam(':content', $content, PDO::PARAM_INT);
        $statement->bindParam(':completed_at', $completed_at, PDO::PARAM_INT);
    }



    // $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    // $statement->bindParam(':title', $title, PDO::PARAM_STR);
    // $statement->bindParam(':content', $content, PDO::PARAM_STR);
    // $statement->bindParam(':created_at', $created_at, PDO::PARAM_STR);
    // $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);

    // $statement->execute();
}
