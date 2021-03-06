<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<div class="wrapper">
    <h1><?php echo $config['title']; ?></h1>

    <?php if (logged_in()) : ?>
        <article>
            <h3>Todays tasks: </h3>
            <?php $todays = todays_tasks($database); ?>
            <?php if ($todays) : ?>
                <h4>Tasks due today: <?= date('Y-m-d') ?></h4>
                <ul>
                    <?php foreach ($todays as $task) : ?>
                        <li>
                            <h6> <?= $task['title'] ?> </h6>
                            <p>Description: <?= $task['content'] ?> </p>
                            <button>
                                <a href="edit_task.php?id= <?= $task['id']; ?>">Update todays task</a>
                            </button>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php else : ?>
                <p>No tasks due today! </p>
            <?php endif ?>
        <?php else : ?>
            <h3>On this site you can do some amazing to do lists to make your life easier!</h3>
        <?php endif ?>
        </article>
</div>
<?php require __DIR__ . '/views/footer.php'; ?>
