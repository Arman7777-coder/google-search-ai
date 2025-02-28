<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Users;

use App\Rules\DifferentNewPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UserCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255|unique:users,email',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'address2' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|exists:country_isos,name',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:255',
            'role' => 'required|exists:roles,id',
            'avatar' => [
                'sometimes',
                File::image()
            ],
        ];
    }
}
