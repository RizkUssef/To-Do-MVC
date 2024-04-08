<?php

use Rizk\ToDoList\Classes\Session;

require_once 'inc/header.php';
?>

<body class="container w-50 mt-5">
    <?php if (Session::checkSession("errors")) : ?>
        <?php foreach (Session::getSession("errors") as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
        <?php endforeach ?>
    <?php endif ?>
    <?php Session::removeSession("errors") ?>

    <?php if (Session::checkSession("success")) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo Session::getSession("success") ?>
        </div>
    <?php endif ?>
    <?php Session::removeSession("success") ?>

    <?php if (Session::checkSession("error")) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo Session::getSession("error") ?>
        </div>
    <?php endif ?>
    <?php Session::removeSession("error") ?>

    <?php foreach ($data as $task) : ?>
        <form action="/To Do List/public/edit/updateHandle?id=<?php echo $task->_id ?>" method="post">
            <textarea type="text" class="form-control" name="task" id="" placeholder="enter your note here"><?php if($data == null ){ echo ($task->task); }?></textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 ">Update</button>
            </div>
        </form>
    <?php endforeach ?>
</body>

</html>