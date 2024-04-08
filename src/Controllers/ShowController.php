<?php

namespace Rizk\ToDoList\Controllers;

use Rizk\ToDoList\Classes\View;
use Rizk\ToDoList\Models\Task;

class ShowController{
    public function showAll(){
        $taskObject = new Task;
        $filter=['status' => ['$exists' => true]];
        $tasks = $taskObject->selectMany($filter);
        View::render('index.php',$tasks);
    }
}