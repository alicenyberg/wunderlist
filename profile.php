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

<!-- profile image views here -->

<?php $image_url = get_image($database); ?>
<img src="<?= $image_url; ?>">

<p>Change your profile picture</p>
<form action="app/users/image/upload.php" method="post" enctype="multipart/form-data">
    <label for="image">Upload image in JPG/PNG format</label>
    <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
    <button type="submit">Upload image</button>
</form>

<p>Change your email address</p>
<form action="app/users/update/email.php" method="post">
    <label for="email">New email address:</label>
    <input type="email" name="email" id="email">
    <button type="submit">Change email address</button>
</form>

<p>Change your password</p>
<form action="app/users/update/password.php" method="post">
    <label for="password">Current password: </label>
    <input type="password" name="password" id="password">
    <label for="new_password">New password: </label>
    <input type="password" name="new_password" id="password">
    <button type="submit">Change password</button>
</form>
