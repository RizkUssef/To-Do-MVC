<?php

use Rizk\ToDoList\Classes\Session;

require_once 'inc/header.php';
?>

<body>
    <div class="container my-3 ">
        <div class="row d-flex justify-content-center">
            <div class="container mb-5 d-flex justify-content-center">
                <div class="col-md-4">
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
                    <form action="/To Do List/public/insert/insertTask" method="post">
                        <textarea type="text" class="form-control" rows="3" name="task" id="" placeholder="enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 ">Add To Do</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php if ($data) { ?>
            <div class="row d-flex justify-content-between">
                <!-- all -->
                <div class="col-md-3 ">
                    <h4 class="text-white">To Do</h4>
                    <div class="m-2  py-3">
                        <div class="show-to-do">
                            <?php foreach ($data as $task) : ?>
                                <?php if ($task->status == "to_do") : ?>
                                    <div class="alert alert-info p-2">
                                        <h4><?php echo $task->task ?></h4>
                                        <h5><?php echo $task->created_at ?></h5>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="/To Do List/public/edit/updatePage?id=<?php echo $task->_id ?>" class="btn btn-info p-1 text-white">edit</a>
                                            <a href="/To Do List/public/edit/changeDoing?id=<?php echo $task->_id ?>" class="btn btn-info p-1 text-white">doing</a>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <!-- doing -->
                <div class="col-md-3 ">
                    <h4 class="text-white">Doing</h4>
                    <div class="m-2 py-3">
                        <div class="show-to-do">
                            <?php foreach ($data as $task) : ?>
                                <?php if ($task->status == "doing") : ?>
                                    <div class="alert alert-success p-2">
                                        <h4><?php echo $task->task ?></h4>
                                        <h5><?php echo $task->created_at ?></h5>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="/To Do List/public/edit/changeToDo?id=<?php echo $task->_id ?>" class="btn btn-warning p-1 text-white">To Do</a>
                                            <a href="/To Do List/public/edit/changeDone?id=<?php echo $task->_id ?>" class="btn btn-success p-1 text-white">Done</a>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <!-- done -->
                <div class="col-md-3">
                    <h4 class="text-white">Done</h4>
                    <div class="m-2 py-3">
                        <div class="show-to-do">
                            <?php foreach ($data as $task) : ?>
                                <?php if ($task->status == "done") : ?>
                                    <div class="alert alert-warning p-2">
                                        <a href="/To Do List/public/delete/deleteTask?id=<?php echo $task->_id ?>" onclick="confirm('are your sure')" class="remove-to-do text-dark d-flex justify-content-end "><i class="fa fa-close" style="font-size:16px;text-decoration: none;"></i></a>
                                        <h4><?php echo $task->task ?></h4>
                                        <h5><?php echo $task->created_at ?></h5>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row d-flex justify-content-center">
                <h1>NO TASKS YET !</h1>
            </div>
        <?php } ?>
    </div>

</body>

</html>