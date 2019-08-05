<?php
session_start();
spl_autoload_register();
$template = new \Core\Template();
$dbInfo = parse_ini_file("config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['password']);
$db = new \Database\PDODatabase($pdo);
$repository = new \App\Repository\TaskRepository($db);
$taskService = new \App\Service\TaskService($repository);
$taskHttpHandler = new \App\Http\HttpHandler($template);