<nav>
    <a href="index.php"><img src="img/spinthink.gif" alt="logo" id="logo"></a>

    <h1 class="headline">Welcome, <?= $_SESSION['username'] ?? "guest" ?>!</h1>

    <div></div>

    <ul class="links">
        <li><a href="browse.php">browse</a></li>
        <li><a href="about.php">about</a></li>

        <?php if ($is_admin): ?>
        <li class="dropdown"><button type="button" class="dropdown-btn">admin panel</button>
            <ul class="dropdown-content">
                <li><a href="users.php">view users</a></li>
                <li><a href="view.php">view books</a></li>
                <li><a href="add_book.php">add book</a></li>
                <li><a href="transactions.php">transactions</a></li>
            </ul>
        </li>
        <?php endif; ?>
    </ul>

    <?php if (isset($_SESSION['user_id'])): ?>
        <form name="logout" action="logout.php" method="post" id="logout-navbar">
            <input type="hidden" name="destination" value="<?= $current_page ?>">
            <button type="submit" class="login-navbar">LOGOUT</button>
        </form>
    <?php else: ?>
        <button type="button" class="login-navbar" id="login-navbar">LOGIN</button>
    <?php endif; ?>

</nav>