<?php

namespace Timetables\Validator;

use Timetables\Validator\Rules\Required;


class LoginValidator extends Validator
{

    public function __construct()
    {
        $this->rules = [
            new Required('email'),
            new Required('password')
        ];
    }

}