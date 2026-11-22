<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Add Contact</h2>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" action="index.php?action=store">
    <input name="name" placeholder="Name" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="phone" placeholder="Phone" required>
    <button type="submit">Save</button>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>