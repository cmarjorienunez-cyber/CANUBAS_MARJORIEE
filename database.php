<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database credentials
$host = 'sql10.freesqldatabase.com';
$user = 'sql10799402';
$pass = 'qkHZ2tWSuw';
$db   = 'sql10799402';
$port = 3306;

// Create connection
$conn = mysqli_connect($host, $user, $pass, $db, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>