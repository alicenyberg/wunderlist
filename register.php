<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isset($_SESSION['errors'])) : ?>
    <?php foreach ($_SESSION['errors'] as $error) : ?>
        <?php echo $error; ?>
    <?php endforeach; ?>
    <?php unset($_SESSION['errors']) ?>
<?php endif; ?>

<h2>Register</h2>
<form action="app/users/register.php" method="post">
    <label for="username">Username:</label>
    <input name="username" id="username" type="text">
    <label for="email">Email:</label>
    <input name="email" id="email" type="email">
    <label for="password">Select your password:</label>
    <input name="password" id="password" type="password">
    <button type="submit" class="btn btn-primary">Register</button>
</form>


<?php require __DIR__ . '/views/footer.php'; ?>
