<?php
namespace App\Entity;

class User{
    private int $id;
    private string $name;
    private string $surname;
    private string $icon;
    private string $email;
    private string $createdAt;
    private string $updatedAt;
    private bool $isVerified;
    private string $lastLoginAt;

    public function __construct(
        $id, 
        $name, 
        $surname, 
        $email, 
        $icon,
        $createdAt,
        $updatedAt,
        $isVerified,
        $lastLoginAt
        ){
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
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

    public function getFullName() : string{
        return $this->name . " " . $this->surname;
    }
}
?>