<?php
session_start();
include 'functions.php';

if (isset($_POST['add'])) {
    addToCart($_POST['product']);
}

if (isset($_POST['remove'])) {
    removeFromCart($_POST['index']);
}
?>
<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Καλάθι Αγορών</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Το καλάθι σας</h2>
    <nav>...</nav>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Το καλάθι είναι άδειο.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($_SESSION['cart'] as $i => $item): ?>
                <li>
                    <?= htmlspecialchars($item) ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="index" value="<?= $i ?>">
                        <button type="submit" name="remove">Αφαίρεση</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
