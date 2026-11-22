<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Admin Login</h2>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" action="index.php?action=login">
    <input name="username" placeholder="Username" required>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>