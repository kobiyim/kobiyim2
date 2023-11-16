<?php

namespace Kobiyim\Auth\Services;

use Kobiyim\Auth\Rules\Password;

trait PasswordValidationRules
{
    protected function passwordRules()
    {
        return ['required', 'string', new Password];
    }
}
