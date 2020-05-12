<?php
define('EMAIL', 'abdo55mohamed1@gmail.com');
define('PASSWORD', '123abdo123456');
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'ourproject';

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}
