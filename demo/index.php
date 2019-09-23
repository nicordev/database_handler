<?php

require_once "Entity/Task.php";
require_once "../DatabaseHandler.php";

$dbHandler = DatabaseHandler::getInstance();
$table = "task";

$dbHandler->connect(
    "demo_database_handler",
    "localhost",
    "root",
    "",
    "utf8",
    "mysql"
);
$dbHandler->purgeTable($table);

for ($i = 0; $i < 10; $i++) {
    $dbHandler->insertARow("task", [
        "title" => "Demo task title $i",
        "content" => "Demo task content $i",
        "reference" => $i
    ]);
}

//$selectStatement = $dbHandler->select("task");
//$tasks = $dbHandler->fetchAll($selectStatement, Task::class);

//$tasks = $dbHandler->findAll("task", Task::class);

//$tasks = $dbHandler->findAll("task", Task::class, "reference > 3");

//var_dump($tasks);

//$task = $dbHandler->find(
//    $table,
//    ["reference" => 5],
//    Task::class
//);
$task = $dbHandler->find(
    $table,
    ["reference" => 5],
    Task::class,
    "title, content"
);

var_dump($task);

var_dump($dbHandler->delete($table, "reference = 5"));

$task = $dbHandler->find(
    $table,
    ["reference" => 5],
    Task::class,
    "title, content"
);

var_dump($task);


