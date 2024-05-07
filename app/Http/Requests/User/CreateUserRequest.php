<?php

namespace App\Http\Requests\User;

use App\UseCases\User\Dto\CreateUserDto;
use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullName' => 'required|string|max:150',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'documentId' => 'required|size:11',
            'birthDate' => 'date',
            'phoneNumber' => 'required|string',
        ];
    }

    public function data(): CreateUserDto
    {
        $fullName = filter_var(trim($this->input('fullName')));
        $email = filter_var(trim($this->input('email')), FILTER_SANITIZE_EMAIL);
        $password = filter_var(trim($this->input('password')));
        $documentId = filter_var(trim($this->input('documentId')));
        $birthDate = filter_var(trim($this->input('birthDate')));
        $phoneNumber = filter_var(trim($this->input('phoneNumber')));

        $createUserDTO =  new CreateUserDTO();
        $createUserDTO->fullName = ucwords(mb_strtolower($fullName));
        $createUserDTO->email = strtolower($email);
        $createUserDTO->password = $password;
        $createUserDTO->documentId = $documentId;
        $createUserDTO->birthDate = new DateTime($birthDate);
        $createUserDTO->phoneNumber = $phoneNumber;

        return $createUserDTO;
    }
}
