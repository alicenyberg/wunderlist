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

<p>Change your profile picture
<p>
<form action="app/users/avatar/upload.php" method="post">
    <label for="avatar">Upload image in JPG/PNG format</label>
    <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg">
    <button type="submit">Upload image</button>
</form>

<p>Change your email address
<p>
<form action="app/users/update/email.php" method="post">
    <label for="email">new email address:</label>
    <input type="email" name="email" id="email">
    <button type="submit">Change email address</button>
</form>

<p>Change your password
<p>
<form action="app/users/update/password" method="post">
    <label for="password">current password: </label>
    <input type="password" name="password" id="password">
    <button type="submit">Upload image</button>
</form>
