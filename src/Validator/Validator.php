<?php

namespace Timetables\Validator;

use Timetables\Base\Application;
use Timetables\Base\Request;

class Validator
{

    protected $rules;

    public function validate(Request $request, Application $app)
    {
        $errors = [];
        foreach ($this->rules as $rule) {
            foreach ($rule->getErrors($request, $app) as $field => $error) {
                $errors[$field] = $error;
            }
        }
        return $errors;
    }

}