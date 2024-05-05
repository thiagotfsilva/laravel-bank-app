<?php

namespace App\Domain\User\Entity;

use DateTime;

class User
{
    private ?int $id;
    private string $fullName;
    private string $email;
    private string $password;
    private string $documentId;
    private DateTime $birthDate;
    private string $phoneNumber;
    private ?DateTime $createdAt;
    private ?DateTime $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setFullName(string $name): void
    {
        $this->fullName = $name;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setDocumentId(string $documentId): void
    {
        $this->documentId = $documentId;
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }


    public function setBirthDate($birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }


    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }


    public function setPhoneNumber($phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }


    public function serializable(): array
    {
        return [
            'fullName' => $this->getFullName(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'documentId' => $this->getDocumentId(),
            'birthDate' => $this->getBirthDate(),
            'phoneNumber' => $this->getPhoneNumber()
        ];
    }
}
