<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// in this file, we save checklists as arrays converted to strings in the database

// add parent_id column in database, set it to null by default. Add subtasks to database one by one and link them to the right task with parent_id.
// Display them on the edit_task page and add checkbox for completed task
