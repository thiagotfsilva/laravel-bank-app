<?php

namespace App\UseCases\Account;

use App\Enitity\Account;
use App\Enum\AccountType;
use App\Models\Account as ModelsAccount;

class CreateAccountUseCase
{
    public function execute(int $userId)
    {
        $account = new Account();
        $account->setUserId($userId);
        return ModelsAccount::create($account->serializable());
    }
}
