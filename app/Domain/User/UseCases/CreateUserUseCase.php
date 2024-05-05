<?php

namespace App\Domain\User\UseCases;

use App\Domain\User\Dto\CreateUserDto;
use App\Domain\User\Entity\User;
use App\Mail\CreateUserEmail;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Mail;

class CreateUserUseCase
{
    public function execute(CreateUserDto $input)
    {
        $user = $this->createUser($input);
        $data = ModelsUser::create($user->serializable());

        Mail::to($user->getEmail())->send(new CreateUserEmail());

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
