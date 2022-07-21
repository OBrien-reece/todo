<?php

echo '<pre>';
var_dump($_POST);
echo '<pre>';

if (!isset($_POST['tasktodo'])) {
    header('Location:todo.php');
}

$taskToDo = empty($_POST['tasktodo']) ? false : $_POST['tasktodo'];
$taskToDo = trim($taskToDo);

if($taskToDo) {

    if(file_exists('todo.json')) {
        $json = file_get_contents('todo.json');
        //make the array associative (key value association)

    }else {
        $jsonArray = [];
    }

    $jsonArray = json_decode($json, true);
    //take the POST value and assign it to the array tasktodo

    $jsonArray[$taskToDo] = ['completed' => false];

    file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

    header('Location:todo.php');
}
