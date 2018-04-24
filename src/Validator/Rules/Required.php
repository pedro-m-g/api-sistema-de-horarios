<?php

namespace Timetables\Validator\Rules;

class Required
{

    private $field;
    private $bag;

    public function __construct($field, $bag = 'json')
    {
        $this->field = $field;
        $this->bag = $bag;
    }

    public function getErrors($request, $app)
    {
        $errors = [];
        $bag = $this->bag;
        if (!$request->$bag($this->field)) {
            $errors[$this->field] = "El campo es requerido";
        }
        return $errors;
    }

}