<?php
class Note{
    private int $id;
    private User $owner;
    private string $title;
    private string $content;
    private string $createdAt;
    private string $updatedAt;
    private bool $isArchived;
    private bool $isDeleted;
}

?>