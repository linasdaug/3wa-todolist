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
         ?>

        <div class="container">
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

        $x = 10;
        $y = 10;
        if (isset($_GET['param'])) {
            $x = $_GET['param'];
            $todo = sortlist($x);
            echo "<script>document.getElementById('th".$x."').classList.add('checked')</script>";
            echo "<script>document.getElementById('th".$y."').classList.add('checked')</script>";
            $y = $x;
        }


        if (isset($_GET['del'])) {
            $x = $_GET['del'];
            unset($todo[$x]);
            rewrite($todo);
        }


        displayChart($todo);

         ?>
         <br>
         <a href="addtask.php" class="btn btn-info" type="button" name="button">Add new item</a>




        </div>
    </body>
</html>
