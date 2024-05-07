<?php

namespace App\UseCases\User;

use App\Enitity\User;
use App\Mail\CreateUserEmail;
use App\Models\User as ModelsUser;
use App\UseCases\Account\CreateAccountUseCase;
use App\UseCases\User\Dto\CreateUserDto;
use Illuminate\Support\Facades\Mail;

class CreateUserUseCase
{
    private CreateAccountUseCase $createAccountUseCase;

    public function __construct(CreateAccountUseCase $createAccountUseCase)
    {
        $this->createAccountUseCase = $createAccountUseCase;
    }

    public function execute(CreateUserDto $input)
    {
        $user = $this->createUser($input);
        $data = ModelsUser::create($user->serializable());

        Mail::to($user->getEmail())->send(new CreateUserEmail());
        $this->createAccountUseCase->execute($data['id']);
        return $data;
    }

    private function createUser(CreateUserDto $input)
    {
        $user = new User();
        $user->setFullName($input->fullName);
        $user->setEmail($input->email);
        $user->setPassword($input->password);
        $user->setDocumentId($input->documentId);
        $user->setPhoneNumber($input->phoneNumber);
        $user->setBirthDate($input->birthDate);

        return $user;
    }
}
