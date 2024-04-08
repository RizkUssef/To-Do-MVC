<?php

namespace Rizk\ToDoList\Classes;

class Header
{
    public static function goTo($path)
    {
        header("location:$path");
        exit;
    }
}
