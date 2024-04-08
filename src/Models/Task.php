<?php

namespace Rizk\ToDoList\Models;

use Rizk\ToDoList\Classes\MongoDB;

class Task extends MongoDB{
    public function setCollectionName(): string
    {
        return "Tasks";
    }

}