<div class="backdrop" id="backdrop" <?= $has_login_error ? "style='display: block'" : null ?>>
    <div class="login-menu" id="login-menu">
        <form class="login-form" name="login" action="login.php" method="post" id="login-form">
            <p class="login-form-header">User Login</p>
            <?php if ($has_login_error): ?>
                <p class="login-error-msg">Invalid username or password.</p>
            <?php endif; ?>
            <input type="hidden" name="destination" value="<?= $current_page ?>">

            <label for="username">username</label>
            <input type="text" name="username" id="username" placeholder="username" <?= $has_login_error ? "style='border: 2px solid crimson'" : null ?>>

            <label for="password">password</label>
            <input type="password" name="password" id="password" placeholder="password" <?= $has_login_error ? "style='border: 2px solid crimson'" : null ?>>

            <button type="submit" id="login-form-button">Log In</button>
        </form>
    </div>
</div>