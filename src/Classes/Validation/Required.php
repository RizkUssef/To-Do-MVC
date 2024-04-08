<?php

namespace Rizk\ToDoList\Classes\Validation;

class Required implements Validator
{
    public function check($key, $value)
    {
        if (empty($value)) {
            return "$key is required";
        } else {
            return false;
        }
    }
}
