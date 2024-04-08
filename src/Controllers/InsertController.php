<?php

namespace Rizk\ToDoList\Controllers;

use Rizk\ToDoList\Classes\Header;
use Rizk\ToDoList\Classes\Request;
use Rizk\ToDoList\Classes\Session;
use Rizk\ToDoList\Classes\Validation\Required;
use Rizk\ToDoList\Classes\Validation\Str;
use Rizk\ToDoList\Classes\Validation\Validation;
use Rizk\ToDoList\Models\Task;

class InsertController{
    public function insertTask(){
        $requset = new Request;
        $validation = new Validation;
        if($requset->checkPost('submit')){
            // recive
            $taskInput = $requset->clearInput($requset->postData("task"));
            // vaildate
            $validation->vaildate("task",$taskInput,[Required::class,Str::class]);
            $errors = $validation->getErrors();
            if(empty($errors)){
                $task = new Task;
                $document =[
                    "task"=>$taskInput,
                    "status"=>"to_do",
                    "created_at"=>date("Y-m-d H:i:s")
                ];
                $taskResult=$task->insert($document);
                if($taskResult>0){
                    Session::setSession("success","inserted successfully");
                    Header::goTo("/To Do List/public/show/showAll");
                }else{
                    Session::setSession("error","somthing wrong try agian later");
                    Header::goTo("/To Do List/public/show/showAll");
                }               
            }else{
                Session::setSession("errors",$errors);
                Header::goTo("/To Do List/public/show/showAll");
            }
        }
    }
}