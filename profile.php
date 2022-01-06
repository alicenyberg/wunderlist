<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<h1>Profile</h1>

<?php if (isset($_SESSION['errors'])) : ?>
    <?php foreach ($_SESSION['errors'] as $error) : ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['errors']) ?>
<?php endif; ?>

<h3>Change your profile picture</h3>
<form action="app/users/image/upload.php" method="post">
    <label for="image">Upload image in JPG/PNG format</label>
    <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
    <button type="submit">Upload image</button>
</form>

<h3>Change your email address</h3>
<form action="app/users/update/email.php" method="post">
    <label for="email">New email address:</label>
    <input type="email" name="email" id="email">
    <button type="submit">Change email address</button>
</form>

<h3>Change your password</h3>
<form action="app/users/update/password" method="post">
    <label for="password">Current password: </label>
    <input type="password" name="password" id="password">
    <label for="password">New password: </label>
    <input type="password" name="password" id="password">
    <button type="submit">Change password</button>
</form>
