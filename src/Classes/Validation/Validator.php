<?php

namespace Rizk\ToDoList\Classes\Validation;

interface Validator
{
    public function check($key, $value);
}
