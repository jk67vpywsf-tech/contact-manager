<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Edit Contact</h2>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" action="index.php?action=update">
    <input type="hidden" name="id" value="<?= htmlspecialchars($contact['id']) ?>">
    <input name="name" value="<?= htmlspecialchars($contact['name']) ?>" required>
    <input name="email" type="email" value="<?= htmlspecialchars($contact['email']) ?>" required>
    <input name="phone" value="<?= htmlspecialchars($contact['phone']) ?>" required>
    <button type="submit">Update</button>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>