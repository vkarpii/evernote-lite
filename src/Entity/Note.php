<?php
namespace App\Entity;

use App\Entity\User;

class Note
{
    private int $id;
    private User $owner;
    private string $title;
    private string $content;
    private string $createdAt;
    private string $updatedAt;
    private bool $isArchived;
    private bool $isDeleted;

    function __construct(
        int $id,
        User $owner,
        string $title,
        string $content,
        string $createdAt,
        string $updatedAt,
        bool $isArchived,
        bool $isDeleted,
    ) {
        $this->id = $id;
        $this->owner = $owner;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->isArchived = $isArchived;
        $this->isDeleted = $isDeleted;
    }

    public function getTitle() : string {
        return $this->title;
    }

    public function getContent(): string{
        return $this->content;
    }
}
