<?php

namespace Rizk\ToDoList\Classes\Http;

use Rizk\ToDoList\Classes\Request;

class Route{
    protected $url ,$controller ,$method;
    public function __construct()
    {
        $this->parsedUrl();
        $this->callMethod();
    }
    public function parsedUrl(){
        $this->url=Request::queryString();
        $parsedUrl = explode("/",$this->url);
        $this->controller = ucfirst($parsedUrl[0])."Controller";
        if(strpos($parsedUrl[1],"&")!=false){
            $parsedQuery = explode("&",$parsedUrl[1]);
            $this->method = $parsedQuery[0]; 
        }else{
            $this->method = $parsedUrl[1]; 
        }
    }

    public function callMethod(){
        $controllerWithNameSpace ="Rizk\ToDoList\Controllers\\".$this->controller ;
        if(class_exists($controllerWithNameSpace)){
            $object = new $controllerWithNameSpace;
            if(method_exists($object,$this->method)){
                call_user_func([$object,$this->method]);
            }else{
                die("method not found");
            }
        }else{
            die("class not found");
        }
    }
}