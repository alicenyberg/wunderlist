<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

?>

<!-- here we can create a list -->
<div>
    <form action="app/lists/create.php" method="post">
        <label for="title">The name of your list:</label> <br>
        <input type="text" name="title" id="title">
        <button type="submit">Create list</button>
    </form>
</div>

<div>
    <ul>
        <?php
        $lists = get_all_lists($database);
        foreach ($lists as $list) : ?>
            <li>
                <h4> <?= $list['title'] ?></h4><br>
                <button>
                    <a href="edit_list.php?id=<?= $list['id']; ?>">Edit your list</a>
                </button>
            </li>
        <?php endforeach ?>
    </ul>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
