<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>To do list</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="master.css">
    </head>
    <body>

        <?php
            include 'header.php';
            session_start();


         ?>

        <div class="container">


            <!-- LENTELĖS GALVA -->


            <table>
            <tr>
                <th id="th0"><a href="view.php?param=0">Title</a></th>
                <th id="th1"><a href="view.php?param=1">Description</a></th>
                <th id="th2"><a href="view.php?param=2">Deadline</a></th>
                <th id="th3"><a href="view.php?param=3">Priority</a></th>
                <th colspan = "3" id="th4"><a href="view.php?param=4">Done</a></th>
            </tr>

        <?php
        include 'functions.php';
        $todo = getcsvfile();
        $count = count($todo);
        $perPage = 10;
        $pageCount = ceil($count / $perPage);
        $x = 10;


        //LENTELĖS RŪŠIAVIMAS

        if (isset($_GET['param'])) {
            $x = $_GET['param'];
            $todo = sortlist($x, $toggle[$x]);
            rewrite($todo);

            if ($toggle[$x] == 0) {
                echo "<script>document.getElementById('th".$x."').classList.add('checked')</script>";
                $toggle[$x] = 1;

            } else if ($toggle[$x] == 1) {
                echo "<script>document.getElementById('th".$x."').classList.remove('checked')</script>";
                echo "<script>document.getElementById('th".$x."').classList.add('checked-reverse')</script>";
                echo "Toglas tesiasi";
                $toggle[$x] = 0;
            }
        }

        //EILUČIŲ TRYNIMAS


        if (isset($_GET['del'])) {
            $x = $_GET['del'];
            $_SESSION['message'] = 'Item deleted';
            unset($todo[$x]);
            rewrite($todo);
        };

        ?>
        <?php if (isset($_SESSION['message'])):  ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['message'] ?>
            </div>
                <?php unset($_SESSION['message']) ?>
        <?php endif ?>





        <!-- //LENTELĖS IŠVEDIMAS -->


        <?php

        if (isset($_GET['pageNum'])){
            $pageNum = $_GET['pageNum'];
        } else {
            $pageNum = 1;
        }



        $from = $perPage * ($pageNum-1);

        if (($from + $perPage) > count($todo)) {
            $till = count($todo) - 1;
        } else {
            $till = $from + $perPage - 1;
        }


        displayChart($todo, $from, $till);


         ?>

         <div class="row">
             <div class="col-md-2 pull-left">
                <ul class="pagination">
                <?php for ($i=1; $i<=$pageCount; $i++): ?>
                    <li <?php if ($i == $pageNum) {echo 'class="active"';}?>><a class="page-link" href="view.php?pageNum=<?php echo $i?>"><?php echo $i ?></a></li>
                <?php endfor; ?>
                </ul>
            </div>
            <div class="addtask col-md-2 pull-right">
                <a href="addtask.php" class="btn btn-primary" type="button" name="button">Add new item</a>
            </div>
        </div>





        </div>
    </body>
</html>
