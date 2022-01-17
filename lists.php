<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

?>
<div class="wrapper">
    <!-- here we can create a list -->
    <div>
        <h3> Create a new list: </h3>
        <div class="mb-3">
            <form action="app/lists/create.php" method="post">
                <label for="title"></label> <br>
                <input type="text" name="title" id="title">
                <button type="submit">Create list</button>
        </div>
        </form>
    </div>



    <div class="lists">
        <h3>Your lists: </h3>
        <ul>
            <?php
            $lists = get_all_lists($database);
            foreach ($lists as $list) : ?>
                <li>
                    <p> <?= $list['title'] ?></p>
                    <button>
                        <a href="edit_list.php?id=<?= $list['id']; ?>">View list</a>
                    </button>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
