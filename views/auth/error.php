<?php
    $error = $_SESSION['error'] ?? null;
    unset($_SESSION['error']);

    if ($error) {
        echo '<div class="form-error">' . htmlspecialchars($error) . '</div>';
    }
?>
