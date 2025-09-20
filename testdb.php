<?php
// Database connection settings
$host = "dpg-d37cc99rofns739d6090-a";
$port = "5432";
$dbname = "marjoriee_crud_db";
$user = "marjoriee_crud_db_user";
$password = "3yeHU5MtqCNIMIKR4Z04ZNZi7qXsJ6L3";

// Build connection string
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Try to connect
$conn = pg_connect($conn_string);

if (!$conn) {
    echo "❌ Connection failed: " . pg_last_error();
} else {
    echo "✅ Connected successfully to PostgreSQL on Render!";
}
?>

