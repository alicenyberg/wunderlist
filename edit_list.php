<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

?>

<!-- update list title -->
<form action="app/lists/update.php" method="post">
    <label for="title">New title: </label>
    <input type="text" name="title" id="title" required>
    <button type="submit">Update title</button>
</form>

<!-- add task -->
<form action="app/task/create.php" method="post">
    <label for="title">Add a title: </label>
    <input type="text" name="title" id="title" required>
    <label for="content">Add some content: </label>
    <input type="text" name="content" id="content" required>
    <label for="deadline">Add a deadline: </label>
    <input type="date" name="deadline" id="deadline" required>
    <button type="submit">Add task!</button>
</form>
