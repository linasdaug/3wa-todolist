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
}

$d = $upd['deadline'];
$hour = date("H", $d);
$minutes = date("i", $d);
$day = date("d", $d);
$year = date("Y", $d);
$month = date("m", $d);



 ?>


<br><br>
<form action="edit.php" method="get">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value = "<?php echo $upd['title']?>" >
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" rows="3"> <?php echo $upd['description'] ?></textarea>
    </div>
    <div class="form-group col-md-2">
        <label for="year">Year</label>
        <select class="form-control" name="year">
            <?php for($i = 2018; $i < 2025; $i++) :?>
            <option value="<?php echo $i ?>"<?php if ($i == $year){echo " selected";}?>><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-1">
        <label for="month">Month</label>
        <select class="form-control" name="month">
            <?php for($i = 1; $i <= 12; $i++) :?>
                <option value="<?php echo $i ?>" <?php if ($i == $month){echo " selected";}?>><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-1">
        <label for="day">Day</label>
        <select class="form-control" name="day">
            <?php for($i = 1; $i <= 31; $i++) :?>
                <option value="<?php echo $i ?>"<?php if ($i == $day){echo " selected";}?>><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="hour">Hour</label>
        <select class="form-control" name="hour">
            <?php for($i = 0; $i <= 23; $i++) :?>
                <option value="<?php echo $i ?>"<?php if ($i == $hour){echo " selected";}?>><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="minutes">Minutes</label>
        <select class="form-control" name="minutes">
            <?php for($i = 0; $i <= 59; $i++) :?>
                <option value="<?php echo $i ?>"<?php if ($i == $minutes){echo " selected";}?>><?php echo $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="minutes">Priority</label>
        <select class="form-control label-warning" name="priority">
            <option value="0"<?php if ($upd['priority'] == 0){echo " selected";}?>>Low</option>
            <option value="1"<?php if ($upd['priority'] == 1){echo " selected class='high'";}?>>High</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="minutes">Done</label>
        <select class="form-control label-warning" name="done">
            <option value="0" <?php if ($upd['done'] == 0){echo " selected";}?>>Not done</option>
            <option value="1" <?php if ($upd['done'] == 0){echo " selected";}?>>Done</option>
        </select>
    </div>
    <div class="row">
        <button type="submit" name = "upd" value = "<?php echo $x ?>" class="btn btn-primary pull-right">Submit</button>
        <a href="index.php" type="submit" class="btn btn-primary pull-left">Return</a>
    </div>
</form>

<?php




 ?>

</div>
