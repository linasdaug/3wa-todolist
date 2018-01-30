<?php

include 'functions.php';

$done=$_GET['done'];
$id=$_GET['id'];
$todo = getcsvfile();
$upd = $todo[$id];


if ($done == 0) {
    $upd['done'] = 1;
} else {
    $upd['done'] = 0;
}

$todo[$id] = $upd;

rewrite($todo);

$p = ceil(($id+1)/10);
redirectToView($p);



 ?>
