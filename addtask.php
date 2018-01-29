<?php

include "header.php";

?>
<div class="container">


<br><br>
<form action="addtask.php" method="get">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control"  placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>
    <div class="form-group col-md-2">
        <label for="year">Year</label>
        <select class="form-control" name="year">
            <?php for($i = 2018; $i < 2025; $i++) :?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="month">Month</label>
        <select class="form-control" name="month">
            <?php for($i = 1; $i <= 12; $i++) :?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-2">
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
    <div class="row">
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
        <a href="index.php" type="submit" class="btn btn-primary pull-left">Return</a>
    </div>
</form>



<?php
$new_title = $_GET['title'];
$new_description = $_GET['description'];
$new_year = $_GET['year'];
$new_month = $_GET['month'];
$new_day = $_GET['day'];
$new_hour = $_GET['hour'];
$new_minutes = $_GET['minutes'];
$new_date = mktime($new_hour, $new_minutes, 0, $new_month, $new_day, $new_year);
$itemadded = 0;

$new_priority = $_GET['priority'];


if ($itemadded == 0 && isset($_GET['title'])) {
    $new_line = array($new_title, $new_description, $new_date, $new_priority, 0);
    $csvfailas = fopen('todolist.csv', 'a');
    fputcsv($csvfailas, $new_line);
    fclose($csvfailas);
    $itemadded = 1;
    echo "<div class='alert alert-success' role='alert'>Item <em>".$new_title."</em> entered</div>";
};




 ?>

</div>
