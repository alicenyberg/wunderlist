<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

?>

<!-- here we can create a list -->
<ul>
    <?php
    $lists = get_all_lists($database);
    foreach ($lists as $list) : ?>
        <li>
            <?= $list['title'] ?><br>
            <button>
                <a href="edit_list.php?id=<?php $list['id']; ?>">Edit your list</a>
            </button>
            <button>
                <a href="edit_task.php?id=<?php $list['id']; ?>">Edit tasks</a>
            </button>
        </li>
    <?php endforeach ?>
</ul>

<form action="app/lists/create.php" method="post">
    <label for="title">The name of your list:</label> <br>
    <input type="text" name="title" id="title">
    <button type="submit">Create list</button>
</form>

<?php require __DIR__ . '/views/footer.php'; ?>
