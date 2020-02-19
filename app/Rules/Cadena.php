<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cadena implements Rule
{

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return preg_match('/^[a-zA-Z0-9 ]/', $value);
    }

    public function message()
    {
        return 'EL :attribute solo se acepta texto y números.';
    }
}
