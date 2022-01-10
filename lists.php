<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

?>


<form action="app/lists/create.php" method="POST">
    <label for="title">The name of your list:</label>
    <input type="text" name="title" id="title">
    <button type="submit">Create list</button>
</form>

<ul>
    <?php
    $lists = get_all_lists($database);
    foreach ($lists as $list) : ?>
        <li>
            <?= $list['title'] ?><br>
            <button>
                <a href="/app/lists/delete.php?id=<?= $list['id']; ?>">Delete </a>
            </button>
        </li>
    <?php endforeach ?>
</ul>

<?php require __DIR__ . '/views/footer.php'; ?>
