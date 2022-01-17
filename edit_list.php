<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>

<!-- button to go back to lists -->
<button> <a href="lists.php">Take me back to all my lists!</a></button> <br>

<?php
$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$lists = get_all_lists($database);
$tasks = get_tasks_list($database);


foreach ($lists as $list) :
    if ($list['id'] == $id) : ?>
        <h3> <?= $list['title']; ?></h3>
    <?php endif; ?>
<?php endforeach; ?>

<?php foreach ($tasks as $task) :
    if ($user_id && $list_id = $id) : ?>
        <p>Task: <?= $task['title']; ?> </p>
        <p>Deadline: <?= $task['deadline_at']; ?> </p>
        <p>Completed at: <?= $task['completed_at']; ?> </p>
        <button> <a href="edit_task.php?id= <?= $task['id']; ?>">Edit task</a></button> <br>
    <?php endif ?>
<?php endforeach ?>

<!-- add task -->
<h4>Add new tasks to your list</h4>
<form action="app/task/create.php?id=<?= $id ?>" method="post">
    <label for="title">Add a title: </label>
    <input type="text" name="title" id="title" required> <br>
    <label for="content">Add some content: </label>
    <input type="text" name="content" id="content" required> <br>
    <label for="deadline">Add a deadline: </label>
    <input type="date" name="deadline" id="deadline" required> <br>
    <button type="submit">Add task!</button>
</form> <br>

<!-- update list title -->
<h4>Update your list title here</h4>
<form action="app/lists/update.php?id=<?= $id ?>" method="post">
    <label for="title">New title: </label>
    <input type="text" name="title" id="title" required>
    <button type="submit">Update title</button>
</form> <br>

<!-- button to delete your list -->
<div>
    <h4>Want to delete the list?</h4>
    <button>
        <a href="/app/lists/delete.php?id=<?= $list['id']; ?>">Delete </a>
    </button>
</div> <br>
