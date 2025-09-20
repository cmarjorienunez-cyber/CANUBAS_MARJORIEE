<?php
$servername = "sql10.freesqldatabase.com"; // palitan ng Hostname galing FreeSQLDatabase
$username   = "sql10799402";               // palitan ng Database User
$password   = "qkHZ2tWSuw";              // palitan ng Password
$dbname     = "sql10799402";               // palitan ng Database Name
$port       = 3306;                        // laging 3306

// Gumamit ng mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check kung nagconnect
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Connected successfully to FreeSQLDatabase!";
}
?>
