<img src="https://media.giphy.com/media/h5Kj3oDLtuh6NoRy5x/giphy.gif">

# Project Title

A to-do website where you can get organized! 

# Installation

1. Clone the repository and open it with a code editor.
2. Open a localhost in your terminal by writing: php -S localhost:8000
3. Now your ready to visit the localhost in your browser!

# Code Review

Code review written by [Sophie Wulff](https://github.com/sowulff).

1. `lists.php:20-22` - Try to use either <a> or <button>. They can't be combined.
2. `register.php` - maybe add a minimum of characters when choosing password by adding an if-statement.
3. `ists.php ` - Seems like the functionality for updating a list i there, just an edit-button missing!
4. `index.php` - Maybe when the user is logged in the homepage could show all lists or tasks for today ex.
5. `register.php` - Make the user repeat their password is an idea. For in cases like when the user misspells it when registering
6. `lists.php` - Since deleting lists is permanent you can add a window alert to your delete-button to prevent the user from deleting by mistake.
7. `profile.php` - right now the profile image the user uploaded dosen’t show on the page anywhere, solution would be to use img tag and print it!
8. `LICENCE` - don’t forgot to add the license in the license file.
9. `index.php` - Maybe add a welcome message when user is logged in.
10. `tasks.php` - Java script is going to be handy when dealing with the checkboxes in the task-file!

Overall you’ve done great so far in this Christmas projekt!

# Testers

Tested by the following people:

1. Amanda Hultén
2. Agnes Skönvall
    
# Wunderlist+

[Nema Vinkeloe Uuskyla](https://github.com/patrosk) added the following:

1. `overview.php` New page called 'overview' where one sees all lists and their respective tasks. 'Overview'has been added to the nav bar and styling has been added to the css file.
2. `complete_all.php` Logic that enables the user to check all tasks in a given list as completed with the click of a button.
3. `edit_task.php:42-87` Section for adding a checklist to a task. The checklist can be updated with up to five items at once. Each checklist is linked to the specific task being updated. The checklist items can be individually deleted and marked as completed or uncompleted. The checklist items are saved in a new table in the database ('checklist').
4. `checklist folder` Folder that contains three files for managing checklist items; create, delete and update. `create.php` adds checklist items to the database, `delete.php` (you guessed it) removes checklist items from the database, and `update.php` changes the checklist item's completed_at value.

view it here in the branch wunderlist+: https://github.com/alicenyberg/wunderlist/pull/2
