<?php
    $email = $_SESSION['old_email'] ?? '';
    unset($_SESSION['old_email']);
    
    $name = $_SESSION['old_name'] ?? '';
    unset($_SESSION['old_name']);

    $surname = $_SESSION['old_surname'] ?? '';
    unset($_SESSION['old_surname']);
?>

<form method="post" action="/registrationAction">
    <a href="/login">
        < Back to login</a><br><br>

            <h2>Registration</h2>

            <?php include __DIR__ . '/error.php'; ?>

            <div class="field">
                <input type="text" name="name" placeholder="Name" value="<?= $name ?>"/>
            </div>

            <div class="field">
                <input type="text" name="surname" placeholder="Surname" value="<?= $surname ?>" />
            </div>

            <div class="field">
                <input type="email" name="email" placeholder="Email" value="<?= $email ?>" />
            </div>

            <div class="password-wrapper field">
                <input type="password" id="password" placeholder="Password">
                <span class="togglePassword eye">👁️</span>
            </div>

            <div class="password-wrapper field">
                <input type="password" id="confirmPassword" placeholder="Repeat Password">
                <span class="togglePassword eye">👁️</span>
            </div>

            <button class="btn">Register</button>
</form>