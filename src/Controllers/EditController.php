<?php

namespace Rizk\ToDoList\Controllers;

use Rizk\ToDoList\Classes\Request;
use MongoDB\BSON\ObjectID;
use Rizk\ToDoList\Classes\Header;
use Rizk\ToDoList\Classes\Session;
use Rizk\ToDoList\Classes\Validation\Required;
use Rizk\ToDoList\Classes\Validation\Str;
use Rizk\ToDoList\Classes\Validation\Validation;
use Rizk\ToDoList\Classes\View;
use Rizk\ToDoList\Models\Task;

class EditController{
    public function updatePage(){
        $request = new Request;
        $taskObject = new Task;
        $id = $request->getData("id");
        $filter = [
            "_id" => new ObjectID($id),
        ];
        $task[] = $taskObject->selectOne($filter);
        View::render("edit.php",$task);
    }

    public function updateHandle(){
        $request = new Request;
        $taskObject = new Task;
        $validation= new Validation;
        $id = $request->getData("id");
        if($request->checkPost("submit")){
            $task = $request->clearInput($request->postData("task"));
            $validation->vaildate("task",$task,[Required::class,Str::class]);
            $errors=$validation->getErrors();
            if(empty($errors)){
                $filter = [
                    "_id" => new ObjectID($id),
                ];
                $update=['$set' =>[
                    "task"=>$task,
                    "updated_at"=>date("Y-m-d H:i:s")
                ]];
                $updateResult = $taskObject->update($filter,$update);
                if($updateResult>0){
                    Session::setSession("success","post updated successfully");
                    Header::goTo("/To Do List/public/show/showAll");  
                }else{                
                    Session::setSession("error","error while updating");
                    Header::goTo("/To Do List/public/edit/updatePage");
                }
            }else{
                Session::setSession("errors",$errors);
                Header::goTo("/To Do List/public/edit/updatePage");
            }
        }else{
            Session::setSession("error","access denied");
            Header::goTo("/To Do List/public/show/showAll");
        }
    }

    public function changeDoing(){
        $request = new Request;
        $taskObject = new Task;
        $id = $request->getData("id");
        $filter = [
            "_id" => new ObjectID($id),
        ];
        $update=['$set' =>[
            "status"=>"doing",
            "updated_at"=>date("Y-m-d H:i:s")
        ]];
        $updateResult = $taskObject->update($filter,$update);
        if($updateResult>0){
            Session::setSession("success","task now in doing stage");
            Header::goTo("/To Do List/public/show/showAll");  
        }else{                
            Session::setSession("error","error while updating");
            Header::goTo("/To Do List/public/show/showAll");
        }
    }

    public function changeDone(){
        $request = new Request;
        $taskObject = new Task;
        $id = $request->getData("id");
        $filter = [
            "_id" => new ObjectID($id),
        ];
        $update=['$set' =>[
            "status"=>"done",
            "updated_at"=>date("Y-m-d H:i:s")
        ]];
        $updateResult = $taskObject->update($filter,$update);
        if($updateResult>0){
            Session::setSession("success","task is Done");
            Header::goTo("/To Do List/public/show/showAll");  
        }else{                
            Session::setSession("error","error while updating");
            Header::goTo("/To Do List/public/show/showAll");
        }
    }

    public function changeToDo(){
        $request = new Request;
        $taskObject = new Task;
        $id = $request->getData("id");
        $filter = [
            "_id" => new ObjectID($id),
        ];
        $update=['$set' =>[
            "status"=>"to_do",
            "updated_at"=>date("Y-m-d H:i:s")
        ]];
        $updateResult = $taskObject->update($filter,$update);
        if($updateResult>0){
            Session::setSession("success","task is Done");
            Header::goTo("/To Do List/public/show/showAll");  
        }else{                
            Session::setSession("error","error while updating");
            Header::goTo("/To Do List/public/show/showAll");
        }
    }
}