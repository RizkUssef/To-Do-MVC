<?php
require_once 'inc/header.php';
?>


<body class="container w-50 mt-5">
    <form action="handle/edit.php" method="post">
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here"></textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
</body>
</html>