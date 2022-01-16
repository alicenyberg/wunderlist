<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>

<?php
$task_id = $_GET['id'];
$tasks = get_tasks($database);
$user_id = $_SESSION['user']['id'];
?>

<?php foreach ($tasks as $task) : ?>
    <?php if ($task_id === $task['id']) : ?>
        <p>Deadline at: <?php $task['deadline_at']; ?> </p>
        <form action="app/task/update.php?id <?= $task_id ?>" method="post">
            <label for="title">Add a new title: </label>
            <input type="text" name="title" id="title" required> <br>
            <label for="content">Update the description: </label>
            <input type="text" name="content" id="content" required> <br>
            <label for="deadline">Update the deadline: </label>
            <input type="date" name="deadline" id="deadline" required> <br>
            <button type="submit">Update task!</button>
        </form>

    <?php endif; ?>
<?php endforeach; ?>
