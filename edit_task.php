<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>


<?php
$task_id = $_GET['id'];
$tasks = get_tasks($database);
$user_id = $_SESSION['user']['id'];
?>

<div class="wrapper">
    <!-- here you can update your task -->
    <?php foreach ($tasks as $task) :
        if ($task_id == $task['id']) : ?>
            <h4> <?= $task['title']; ?> </h4>
            <p>Deadline at: <?= $task['deadline_at']; ?> </p>
            <p>Description: <?= $task['content']; ?> </p>
            <?php $status = status($task); ?>
            <div class="mb-3">
                <form action="app/task/update.php?id=<?= $task_id ?>" method="post">
                    <label for="title">Add a new title: </label>
                    <input type="text" name="title" id="title"> <br>
                    <label for="content">Update the description: </label>
                    <input type="text" name="content" id="content"> <br>
                    <label for="deadline">Update the deadline: </label>
                    <input type="date" name="deadline" id="deadline"> <br>

                    <!-- here you can mark task as completed and uncompleted, i tried with checkboxes but didn't make it work, so radio buttons instead. -->
                    <label for="completed">Done</label>
                    <input name="status" id="completed" value="completed" type="radio" <?= $status['completed'] ?>>
                    <label for="uncompleted">Not done</label>
                    <input name="status" id="uncompleted" value="uncompleted" type="radio" <?= $status['uncompleted'] ?>>
                    <div class="button_wrapper">
                        <button class="update" id="wrapped" type="submit" class="btn btn-primary">Update task</button>
                    </div>
                </form> <br>
            </div>

            <!-- here you can add and edit checklists to your task -->
            <div class="checklist-wrapper">
                <div class="checklist-button">
                    <button>Add checklist to this task</button>
                </div>
                <div class="checklist-form hidden">
                    <h5>Checklist:</h5>
                    <!-- $checklist = get_checklist($database) -->
                    <ul>
                        <!-- foreach ($checklist as $checklist_item) {
                            li
                            $name
                            button complete/incomplete
                            button delete
                            li';} -->
                    </ul>
                    <br>
                    <form action="/app/task/save_checklist.php?id=<?= $task['id'] ?>" method="post">
                        <label for="checklist-item"></label>
                        <input type="text" name="checklist-item[]">
                        <label for="checklist-item"></label>
                        <input type="text" name="checklist-item[]">
                        <label for="checklist-item"></label>
                        <input type="text" name="checklist-item[]">
                        <label for="checklist-item"></label>
                        <input type="text" name="checklist-item[]">
                        <label for="checklist-item"></label>
                        <input type="text" name="checklist-item[]">
                        <button>Add to checklist</button>
                    </form>
                </div>
            </div>

            <!-- here you can delete a task -->
            <div class="delete-wrapper">
                <h4>Want to delete your task?</h4>
                <button class="delete">
                    <a href="/app/task/delete.php?id= <?= $task['id']; ?> " onclick=" return confirm('Are you sure you want to delete the list? It will also remove all tasks.');">Delete</a>
                </button>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>

<?php require __DIR__ . '/views/footer.php';
