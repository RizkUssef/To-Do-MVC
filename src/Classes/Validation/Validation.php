<?php

namespace Rizk\ToDoList\Classes\Validation;

class Validation
{
    private $errors = [];
    public function vaildate($key, $value, $rules)
    {
        foreach ($rules as $rule) {
            $objectRule = new $rule;
            $error = $objectRule->check($key, $value);
            if ($error != false) {
                $this->errors[] = $error;
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
