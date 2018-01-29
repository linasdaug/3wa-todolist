<?php

include "header.php";

?>
<div class="container">

<?php

include 'functions.php';
$todo = getcsvfile();

if (isset($_GET['upd'])) {
    $x = $_GET['upd'];
    $upd = $todo[$x];
    var_dump($upd);
}



 ?>


<br><br>
<form action="update.php" method="get">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value = "<?php echo $upd['title']?>" >
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" rows="3" > <?php echo $upd['description'] ?></textarea>
    </div>
    <div class="form-group col-md-2">
        <label for="year">Year</label>
        <select class="form-control" name="year">
            <?php for($i = 2018; $i < 2025; $i++) :?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-1">
        <label for="month">Month</label>
        <select class="form-control" name="month">
            <?php for($i = 1; $i <= 12; $i++) :?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-1">
        <label for="day">Day</label>
        <select class="form-control" name="day">
            <?php for($i = 1; $i <= 31; $i++) :?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="hour">Hour</label>
        <select class="form-control" name="hour">
            <?php for($i = 0; $i <= 23; $i++) :?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="minutes">Minutes</label>
        <select class="form-control" name="minutes">
            <?php for($i = 0; $i <= 59; $i++) :?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="minutes">Priority</label>
        <select class="form-control label-warning" name="priority">
            <option value="0">Low</option>
            <option value="1">High</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="minutes">Done</label>
        <select class="form-control label-warning" name="done">
            <option value="0">Not done</option>
            <option value="1">Done</option>
        </select>
    </div>
    <div class="row">
        <button type="submit" name = "upd" value = "<?php echo $x ?>" class="btn btn-primary pull-right">Submit</button>
        <a href="index.php" type="submit" class="btn btn-primary pull-left">Return</a>
    </div>
</form>

<?php



$upd['title'] = $_GET['title'];
$upd['description'] = $_GET['description'];
$new_year = $_GET['year'];
$new_month = $_GET['month'];
$new_day = $_GET['day'];
$new_hour = $_GET['hour'];
$new_minutes = $_GET['minutes'];
$upd['deadline'] = mktime($new_hour, $new_minutes, 0, $new_month, $new_day, $new_year);
$itemupdated = 0;
$upd['priority'] = $_GET['priority'];
$upd['done'] = $_GET['done'];
var_dump($upd);
echo $x;
echo "<br>";


if ($itemupdated == 0 && isset($_GET['title'])) {
    $todo[$x] = $upd;
    rewrite($todo);

    var_dump($todo);
}





 ?>

</div>
