<?php

namespace App\Enitity;

use App\Enum\AccountType;

class Account
{
    private ?int $id;
    private string $accountType = 'CORRENTE';
    private string $accountNumber;
    private float $balance = 0;
    private int $userId;

    public function __construct()
    {
        $this->createAccountNumber();
    }

    public function getId(): int
    {
        return $this->id;
    }

    private function createAccountNumber(): void
    {
        $this->accountNumber = mt_rand(10000000, 99999999);
    }

    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    public function getAccountType(): string
    {
        return $this->accountType;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function serializable(): array
    {
        return [
            'accountType' => $this->getAccountType(),
            'accountNumber' => $this->getAccountNumber(),
            'balance' => $this->getBalance(),
            'userId' => $this->getUserId()
        ];
    }
}
