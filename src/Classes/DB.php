<?php

namespace Rizk\ToDoList\Classes;

interface DB
{
    public function selectOne($filter, $options = []);
    public function selectMany($filter, $options = []);
    public function insert($document);
    public function update($filter, $update, $options = []);
    public function delete($filter, $options = []);
}
