<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h2>Register</h2>
    <form action="app/users/register.php" method="post">
        <label for="user_name">user name:</label>
        <input name="user_name" id="user_name" type="text">
        <label for="email_address">email_address:</label>
        <input name="email_address" id="email_address" type="email">
        <label for="password">select your password:</label>
        <input name="password" id="password" type="password">
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
