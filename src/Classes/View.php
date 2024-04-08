<?php

namespace Rizk\ToDoList\Classes;

class View
{
    public static function render($fileName, $data = [])
    {
        $path = "C:/xampp/htdocs/To Do List/src/Views/" . $fileName;
        if (file_exists($path)) {
            extract($data);
            include($path);
        } else {
            die('file does not exists');
        }
    }
}
