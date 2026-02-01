<?php
namespace App\Entity;

class User{
    private int $id;
    private string $name;
    private string $surname;
    private string $icon;
    private string $email;
    private string $password;
    private string $createdAt;
    private string $updatedAt;
    private bool $isVerified;
    private string $lastLoginAt;

    public function __construct($name, $surname, $email)
    {
        $this->id = 1;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getSurname(): string{
        return $this->surname;
    }

    public function getEmail(): string{
        return $this->email;
    }
}
?>