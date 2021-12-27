<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>

    <h2>Register</h2>
    <form action="app/users/register.php" method="post">
        <label for="user_name">Username:</label>
        <input name="user_name" id="user_name" type="text">
        <label for="email_address">Email:</label>
        <input name="email_address" id="email_address" type="email">
        <label for="password">Select your password:</label>
        <input name="password" id="password" type="password">
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
