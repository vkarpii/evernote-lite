<?php
    $email = $_SESSION['old_email'] ?? '';
    unset($_SESSION['old_email']);
?>

<form method="post" action="/loginAction">
    <h2>LOGIN</h2>

    <?php include __DIR__ . '/error.php'; ?>

    <div class="field">
        <input type="email" name="email" placeholder="Email"  value="<?= $email ?>"/>
    </div>

    <div class="password-wrapper field">
        <input type="password" id="password" placeholder="Password">
        <span class="togglePassword eye">👁️</span>
    </div>

    <a href="/registration">Don't have an account yet?</a>

    <button class="btn">Login</button>
</form>