<?php

include "header.php";

?>
<div class="container">

<?php

include 'functions.php';
$todo = getcsvfile();

if (isset($_GET['upd'])) {
    $x = $_GET['upd'];
    $upd = $todo[$x-1];
}
var_dump($upd);

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
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
        <a href="index.php" type="submit" class="btn btn-primary pull-left">Return</a>
    </div>
</form>



<?php
$upd_title = $_GET['title'];
$upd_description = $_GET['description'];
$upd_year = $_GET['year'];
$upd_month = $_GET['month'];
$upd_day = $_GET['day'];
$upd_hour = $_GET['hour'];
$upd_minutes = $_GET['minutes'];
$upd_date = mktime($upd_hour, $upd_minutes, 0, $upd_month, $upd_day, $upd_year);
$itemupdated = 0;

$upd_priority = $_GET['priority'];
$upd_done = $GET['done'];


if ($itemupdated == 0 && isset($_GET['title'])) {

    foreach ($todo as $fields=>$values) {
         if ($fields == $x-1) {
             $fields['title'] = $upd_title;
             $fields['description'] = $upd_description;
             $fields['deadline'] = $upd_date;
             $fields['priority'] = $upd_priority;
             $fields['done'] = $upd_done;
         }
    }
    var_dump($todo);
    // rewrite ($todo);
}







 ?>

</div>
