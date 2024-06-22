<?php

$config = include("config.php");
$host = $config['db_host'];
$user = $config['db_user'];
$password = $config['db_password'];
$dbname = $config['db_name'];
$port = 5432;

// String de conexión
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    $conn = new PDO($dsn);
    if ($conn) {
        return $conn;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>