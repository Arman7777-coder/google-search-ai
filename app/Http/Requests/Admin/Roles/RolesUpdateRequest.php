<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Roles;

use Illuminate\Foundation\Http\FormRequest;

class RolesUpdateRequest extends FormRequest
{
    public array $permissions;
    public string $name;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',
        ];
    }
}
