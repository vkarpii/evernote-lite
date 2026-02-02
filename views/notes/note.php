<div class="note">
    <div class="note-header">
        <h3><?= htmlspecialchars($note->getTitle()) ?></h3>

        <div class="status">
            <span class="s orange"></span>
            <span class="s blue"></span>
            <span class="s red"></span>
        </div>
    </div>

    <p>
        <?= nl2br(htmlspecialchars($note->getContent())) ?>
    </p>
</div>