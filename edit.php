<?php

include 'functions.php';
$todo = getcsvfile();

$x = $_GET['upd'];

$upd['title'] = $_GET['title'];
$upd['description'] = $_GET['description'];
$new_year = $_GET['year'];
$new_month = $_GET['month'];
$new_day = $_GET['day'];
$new_hour = $_GET['hour'];
$new_minutes = $_GET['minutes'];
$upd['deadline'] = mktime($new_hour, $new_minutes, 0, $new_month, $new_day, $new_year);
$upd['priority'] = $_GET['priority'];
$upd['done'] = $_GET['done'];



if (isset($_GET['title'])) {
    $todo[$x] = $upd;
    rewrite($todo);
    redirectToView(1);

}







 ?>
