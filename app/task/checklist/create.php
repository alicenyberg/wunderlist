<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

// in this file, we save checklists in the database. Each checklist is linked to a single task.

if (isset($_POST['checklist-item'])) {

    foreach ($_POST['checklist-item'] as $checklist_item) {
        $task_id = $_GET['id'];
        $user_id = $_SESSION['user']['id'];
        $content = filter_var(trim($checklist_item), FILTER_UNSAFE_RAW);

        //make sure to only add checklist items that have content
        if ($content != '') {
            $statement = $database->prepare('INSERT INTO checklists
            (user_id, task_id, content)
            VALUES
            (:user_id, :task_id, :content)');
            $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
            $statement->bindParam(':content', $content, PDO::PARAM_STR);

            $statement->execute();
        }
    }
}

redirect('/edit_task.php?id=' . $task_id);
