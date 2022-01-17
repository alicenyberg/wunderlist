<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>


<!-- button to go back to lists -->
<button class="back"> <a href="lists.php">Take me back to all my lists!</a></button>

<?php
$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$lists = get_all_lists($database);
$tasks = get_tasks_list($database);

?>
<div class="wrapper">
    <?php foreach ($lists as $list) :
        if ($list['id'] == $id) : ?>
            <h3> <?= $list['title']; ?></h3>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="task-list">
        <?php foreach ($tasks as $task) :
            if ($user_id && $list_id = $id) : ?>
                <p>Task: <?= $task['title']; ?> </p>
                <p>Deadline: <?= $task['deadline_at']; ?> </p>
                <p>Description: <?= $task['content']; ?> </p>
                <button> <a href="edit_task.php?id= <?= $task['id']; ?>">Edit task</a></button> <br>
            <?php endif ?>
        <?php endforeach ?>
    </div>
    <!-- add task -->
    <div class="new-task">
        <h4>Add new tasks to your list</h4>
        <div class="mb-3">
            <form action="app/task/create.php?id=<?= $id ?>" method="post">
                <label for="title">Add a title: </label>
                <input type="text" name="title" id="title" required> <br>
                <label for="content">Add some content: </label>
                <input type="text" name="content" id="content" required> <br>
                <label for="deadline">Add a deadline: </label>
                <input type="date" name="deadline" id="deadline" required> <br>
                <button type="submit">Add task!</button>
        </div>
        </form> <br>
    </div>

    <!-- update list title -->
    <div class="update-list">
        <h4>Update your list title here</h4>
        <div class="mb-3">
            <form action="app/lists/update.php?id=<?= $id ?>" method="post">
                <label for="title">New title: </label>
                <input type="text" name="title" id="title" required>
                <button type="submit">Update title</button>
        </div>
        </form> <br>
    </div>

    <!-- button to delete your list -->
    <div class="delete-wrapper">
        <h4>Want to delete the list?</h4>
        <button class="delete">
            <a href="/app/lists/delete.php?id=<?= $list['id']; ?>">Delete </a>
        </button>
    </div> <br>
</div>
