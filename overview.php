<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

//new page added to the project. On this page, the user sees all lists with their tasks and
//can mark the tasks as completed or uncompleted. It is also possible to mark all tasks as
//completed by clicking the button.

$user_id = $_SESSION['user']['id'];
$lists = get_all_lists($database);
$tasks = get_tasks($database);
?>

<div class="lists-wrapper">
    <ul>
        <?php foreach ($lists as $list) : ?>
            <div class="single-list">
                <h3><?= $list['title'] ?></h3>
                <ul>
                    <?php foreach ($tasks as $task) : ?>
                        <?php if ($task['list_id'] == $list['id']) :
                            $status = status($task); ?>
                            <li>
                                <h5><?= $task['title'] ?></h5>
                                <form>
                                    <label for="completed">Done</label>
                                    <input name="status" id="completed" value="completed" type="radio" <?= $status['completed'] ?>><br>
                                    <label for="uncompleted">Not done</label>
                                    <input name="status" id="uncompleted" value="uncompleted" type="radio" <?= $status['uncompleted'] ?>>
                                </form>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
                <button><a href="/app/task/complete_all.php?list_id=<?= $list['id'] ?>" onclick="return confirm('Are you sure you want to complete all tasks in this list? All tasks will be set to have been completed today.');">
                        Complete all tasks in this list</a>
                </button>
            </div>
        <?php endforeach ?>
    </ul>
</div>

<?php require __DIR__ . '/views/footer.php';
