<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "sql200.infinityfree.com";   // DB host from vPanel
$user = "if0_39890873";              // DB username
$pass = "tmMVF1nZqeRrr1";            // DB password (same as vPanel pw)
$db   = "if0_39890873_CRUD";         // DB name

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}
echo "✅ Connected successfully to InfinityFree DB!";
?>
