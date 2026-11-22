<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>All Contacts</h2>

<table border="1" cellpadding="6">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Created At</th>
        <?php if (!empty($_SESSION['admin'])): ?>
            <th>Actions</th>
        <?php endif; ?>
    </tr>
    <?php foreach ($contacts as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['id']) ?></td>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= htmlspecialchars($c['email']) ?></td>
            <td><?= htmlspecialchars($c['phone']) ?></td>
            <td><?= htmlspecialchars($c['created_at']) ?></td>
            <?php if (!empty($_SESSION['admin'])): ?>
                <td>
                    <a href="index.php?action=edit&id=<?= htmlspecialchars($c['id']) ?>">Edit</a>
                    <form method="POST" action="index.php?action=delete" style="display:inline;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($c['id']) ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>