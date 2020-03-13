<?php
$dsn = 'mysql:dbname=mysql;host=mysql2;port=3306';
$username = 'root';
$password = '123456';
$db = new PDO($dsn, $username, $password);
var_dump($db);

phpinfo();

