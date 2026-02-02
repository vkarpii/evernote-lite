<?php
namespace App\Entity\Partical;

class AuthUser
{
    private int $id;
    private string $passwordHash;

    public function __construct(int $id, string $passwordHash)
    {
        $this->id = $id;
        $this->passwordHash = $passwordHash;
    }

    public function getId(): int{
        return $this->id;
    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->passwordHash);
    }
}
?>
