<div class="notes">
    <?php if (empty($notes)): ?>
        <p>No notes yet.</p>
    <?php else: ?>

        <?php foreach ($notes as $note): ?>
            <?php require __DIR__ . '/note.php'; ?>
        <?php endforeach; ?>

    <?php endif; ?>

</div>