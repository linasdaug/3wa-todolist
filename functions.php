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




function sortlist($x) {
    $todo = getcsvfile();
    switch ($x) {
        case 0:
        $title = [];
        foreach ($todo as $value) {
            $title[]=$value['title'];
        }
        array_multisort($title, $todo);
        break;

        case 1:
        $description = [];
        foreach ($todo as $value) {
            $description[]=$value['description'];
        }
        array_multisort($description, $todo);
        break;

        case 2:
        $deadline = [];
        foreach ($todo as $value) {
            $deadline[]=$value['deadline'];
        }
        array_multisort($deadline, $todo);
        break;

        case 3:
        $priority = [];
        foreach ($todo as $value) {
            $priority[]=$value['priority'];
        }
        array_multisort($priority, $todo);
        break;

        case 4:
        $done = [];
        foreach ($todo as $value) {
            $done[]=$value['done'];
        }
        array_multisort($done, $todo);
        break;
    }

    return $todo;
}





function displayChart($todo) {

    $display = 0;
    $i = 1;
    foreach ($todo as $line) {
        echo "<tr>";
        foreach ($line as $key => $value) {
            $priority = 0;
            $display = $value;
            if ($key == "done") {
                if ($value) {
                    $display = "Done";
                } else {
                    $display = "Not done";
                }
            }
            if ($key == "deadline") {
                    $display = date("Y-m-d h:i", $value);
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
                    echo "<td>".$display."</td>";
                }
            }
        echo "<td><a href='view.php?del=".$i."'>Delete</a></td>";
        echo "<td><a href='update.php?upd=".$i."'>Update</a></td>";
        echo "</tr>";
        $i++;
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
