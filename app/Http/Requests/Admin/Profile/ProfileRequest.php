<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Profile;

use App\Rules\DifferentNewPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id.',id' ,
            'password' => ['nullable', 'string', 'min:6', 'confirmed', new DifferentNewPassword()],
            'password_confirmation' => 'nullable|required_with:password|string|min:6',
            'address' => 'nullable|string',
            'address2' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'avatar' => [
                'sometimes',
                File::image()
            ],

        ];
    }
}
