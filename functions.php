<?php

function getcsvfile() {
    $csvfailas = fopen('todolist.csv', 'r');

    while (($a=fgetcsv($csvfailas)) !=false) {
        $todo[] = [
            "title" => $a[0],
            "description" => $a[1],
            "deadline" => $a[2],
            "priority" => $a[3],
            "done" => $a[4]
        ];
    };
    fclose($csvfailas);
    return $todo;
};




function sortlist($x, $sorttype) {
    $s = SORT_ASC;
    if ($sorttype == 1) {
        $s = SORT_DESC;
    }
    $todo = getcsvfile();
    switch ($x) {
        case 0:
        $title = [];
        foreach ($todo as $value) {
            $title[]=$value['title'];
        }
        array_multisort($title, $s, $todo);
        break;

        case 1:
        $description = [];
        foreach ($todo as $value) {
            $description[]=$value['description'];
        }
        array_multisort($description, $s, $todo);
        break;

        case 2:
        $deadline = [];
        foreach ($todo as $value) {
            $deadline[]=$value['deadline'];
        }
        array_multisort($deadline, $s, $todo);
        break;

        case 3:
        $priority = [];
        foreach ($todo as $value) {
            $priority[]=$value['priority'];
        }
        array_multisort($priority, $s, $todo);
        break;

        case 4:
        $done = [];
        foreach ($todo as $value) {
            $done[]=$value['done'];
        }
        array_multisort($done, $s, $todo);
        break;
    }
    return $todo;
}





function displayChart($todo, $x, $y) {

    $display = 0;

    for ($i = $x; $i <= $y; $i++) {

        echo "<tr>";
        foreach ($todo[$i] as $key => $value) {

            $priority = 0;
            $display = $value;
            if ($key == "done") {
                if ($value) {
                    $display = "<a class='done' id='d".$i."' href='done.php?done=1&id=".$i."'>Done</a>";
                } else {
                    $display = "<a class='notdone' id='d".$i."' href='done.php?done=0&id=".$i."'>Not done</a>";
                }
            }
            if ($key == "deadline") {
                if ($value < time()) {
                    $display = "<p class='urgent'>".date("Y-m-d h:i", $value)."</p>";
                } else {
                    $display = date("Y-m-d h:i", $value);
                };
            }
            if ($key == "priority") {
                if ($value == 1) {
                    $display = "high";
                    $priority = 1;
                } else {
                    $display = "low";
                }
            }

            if ($priority == 1) {
                echo "<td class='high'>".$display."</td>";
                } else {
                    if ($key == 'done') {
                        echo "<td>".$display."</td>";
                    } else {
                    echo "<td>".($display)."</td>";
                }
            }
        }
        echo "<td><a href='view.php?del=".$i."'>Delete</a></td>";
        echo "<td><a href='update.php?upd=".$i."'>Update</a></td>";
        echo "</tr>";

    }
    echo "</table>";
}

function rewrite ($todo) {
    $csvfailas = fopen('todolist.csv', 'w');
    foreach ($todo as $fields) {
        fputcsv($csvfailas, $fields);
    }
    fclose($csvfailas);
}

function redirectTo () {
    header('Location: index.php');
    exit;
}

function redirectToView($p) {
    header('Location: view.php?pageNum='.$p);
    exit;
}


 ?>
