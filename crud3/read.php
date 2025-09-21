<?php
include 'database.php'; // dito na siya nagko-connect

$sql = "SELECT * FROM students";  // depende kung ano table name mo
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['id'] . " - " . $row['name'] . "<br>";
}
?>
