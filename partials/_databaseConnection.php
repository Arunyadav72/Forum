<?php
$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "forum";

$dsn = "mysql:host=localhost; dbname=forum";
$conn = new PDO($dsn, $username, $password);
if (!$conn) {
    die("Sorry we failed to connect");
}
