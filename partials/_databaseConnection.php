<?php
$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "forum";

$dsn = "mysql:host=localhost; dbname=forum";

try {
    $conn = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Something went wrong';
}
