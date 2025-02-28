<?php

declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class DifferentNewPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     */
    public function passes($attribute, $value): bool
    {
        $user = auth()->user();

        if ($user) {
            return !Hash::check($value, $user->password);
        }

        return false;
    }

    /** Get the validation error message. */
    public function message(): string
    {
        return 'New password must be different from old one.';
    }
}
