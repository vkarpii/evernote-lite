<?php
namespace App\Service;

use App\Repository\NoteRepository;

class NoteService{
    public function __construct(private NoteRepository $noteRepository) {}

    public function getNotesForUser(int $userId): array{
        return $this->noteRepository->findByUserId($userId);
    }
}
?>