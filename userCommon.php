<?php
session_start();
spl_autoload_register();
$template = new \Core\Template();
$dbInfo = parse_ini_file("config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['password']);
$db = new \Database\PDODatabase($pdo);
$repository = new \App\Repository\UserRepository($db);
$userService = new \App\Service\UserService($repository);
$userHttpHandler = new \App\Http\HttpHandler($template);