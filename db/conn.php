<?php

// Development Connection
$host = "localhost";
$db = "ticketsys";
$user = "root";
$pass = "";
$charset = "utf8mb4";

//Remote Database Connection
//$host = "sql5.freesqldatabase.com";
//$db = "sql5472163";
//$user = "sql5472163";
//$pass = "mr6Iz3TVi7";
//$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset"; // data source name

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
}

require_once 'crud.php';
require_once 'user.php';
$crud = new crud($pdo);
$user = new user($pdo);

$user->insertUser("Adrian", "password");
$user->insertUser("Barbara", "password");
$user->insertUser("Pamela", "password");

?> 
