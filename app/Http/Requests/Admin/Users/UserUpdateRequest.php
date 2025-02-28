<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Users;

use App\Rules\DifferentNewPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required','string','email','max:255', Rule::unique('users')->ignore($this->user)],
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'address2' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|exists:country_isos,name',
            'state' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:255',
            'role' => 'required|exists:roles,id',

            'avatar' => [
                'sometimes',
                File::image()
            ],
        ];
    }
}
