<nav class="navbar">
    <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/index.php">Home</a>
        </li>
        <?php if (logged_in()) : ?>
            <li class="nav-item">
                <a class="nav-link" href="/profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/lists.php">Lists</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tasks.php">All tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/overview.php">Overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/app/users/logout.php">Logout</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="/login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link" href="/register.php">Register</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
