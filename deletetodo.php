<?php

$savedTaskFile = file_get_contents('todo.json');
$AssocSavedTaskFile = json_decode($savedTaskFile, true);

$todoName = $_POST['deletetodo'];
unset($AssocSavedTaskFile[$todoName]);

$saveFileDeleted = file_put_contents('todo.json', json_encode($AssocSavedTaskFile, JSON_PRETTY_PRINT));

header('Location:todo.php');
