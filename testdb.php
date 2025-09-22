<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'database.php'; // Correct path

// Query
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

// Check if query worked
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Show data
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['id'] . " - " . $row['first_name'] . " " . $row['last_name'] . "<br>";
}
?>
