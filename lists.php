<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

?>

<form action="app/lists/create.php" method="POST">
    <label for="title">The name of your list:</label>
    <input type="text" name="title" id="title">
    <button type="submit">Create list</button>
</form>


<?php require __DIR__ . '/views/footer.php'; ?>
