<?php

namespace Rizk\ToDoList\Controllers;

use Rizk\ToDoList\Classes\Request;
use Rizk\ToDoList\Models\Task;
use MongoDB\BSON\ObjectID;
use Rizk\ToDoList\Classes\Header;
use Rizk\ToDoList\Classes\Session;

class DeleteController{
    public function deleteTask(){
        $request = new Request;
        $taskObject = new Task;
        $id = $request->getData("id");
        $filter = [
            "_id" => new ObjectID($id),
        ];
        $deleteResult = $taskObject->delete($filter);
        if($deleteResult>0){
            Session::setSession("success","post deleted successfully");
            Header::goTo("/To Do List/public/show/showAll");
        }else{
            Session::setSession("error","error while deleted");
            Header::goTo("/To Do List/public/show/showAll");
        }
    }
}