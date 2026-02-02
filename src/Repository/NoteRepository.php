<?php
namespace App\Repository;

use PDO;
use App\Entity\User;
use App\Entity\Note;

class NoteRepository{
    public function __construct(
            private PDO $db
        ) {}

    public function findByUserId(int $userId): array
    {
        $sql = "
            SELECT 
                n.id AS note_id,
                n.title,
                n.content,
                n.created_at,
                n.updated_at,
                n.is_archived,
                n.is_deleted,

                u.id AS user_id,
                u.name,
                u.surname,
                u.email,
                u.icon,
                u.created_at,
                u.updated_at,
                u.is_verified,
                u.last_login_at
            FROM notes n
            JOIN users u ON u.id = n.user_id
            WHERE n.user_id = :user_id
              AND n.is_deleted = FALSE
            ORDER BY n.updated_at DESC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'user_id' => $userId
        ]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $notes = [];

        foreach ($rows as $row) {

            $user = new User(
                (int)$row['user_id'],
                $row['name'],
                $row['surname'],
                $row['email'],
                $row['icon'],
                $row['created_at'],
                $row['updated_at'],
                $row['is_verified'],
                $row['last_login_at']
            );

            $notes[] = new Note(
                (int)$row['note_id'],
                $user,
                $row['title'],
                $row['content'],
                $row['created_at'],
                $row['updated_at'],
                (bool)$row['is_archived'],
                (bool)$row['is_deleted']
            );
        }

        return $notes;
    }
}
?>