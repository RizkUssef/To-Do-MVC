<?php

namespace Rizk\ToDoList\Classes\Validation;

class Str implements Validator
{
    public function check($key, $value)
    {
        if (is_numeric($value)) {
            return "$key must be string";
        } else {
            return false;
        }
    }
}
