<?php

declare(strict_types=1);

namespace App\Repository;

use PDO;
use App\Entity\Partical\AuthUser;

class UserRepository
{
    public function __construct(
        private PDO $db
    ) {}

    public function findByEmail(string $email): ?AuthUser
    {
        $stmt = $this->db->prepare(
            'SELECT id, password FROM users WHERE email = :email LIMIT 1'
        );
        $stmt->execute([
            'email' => $email
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }
        return new AuthUser(
            $user['id'],
            $user['password']
        );
    }

    public function isEmailExist(string $email): bool
    {
        $stmt = $this->db->prepare(
            "SELECT 1 FROM users WHERE email = :email LIMIT 1"
        );

        $stmt->execute([
            'email' => $email
        ]);

        return (bool) $stmt->fetchColumn();
    }

    public function createUser(
        string $name,
        string $surname,
        string $email,
        string $hashedPassword
    ): int {
        $stmt = $this->db->prepare(
            "INSERT INTO users (name, surname, email, password, last_login_at) 
            VALUES (:name, :surname, :email, :password, NOW())"
        );

        $stmt->execute([
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        return (int) $this->db->lastInsertId();
    }
    public function updateLastLogin(int $userId): void
    {
        $stmt = $this->db->prepare("UPDATE users SET last_login_at = NOW() WHERE id = :id");
        $stmt->execute([
            ':id' => $userId,
        ]);
    }
}
