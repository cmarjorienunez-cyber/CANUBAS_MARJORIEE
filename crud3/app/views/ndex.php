<?php
// 1. Database connection
$conn = new mysqli("sql10.freesqldatabase.com", "sql10799402", "qkHZ2tWSuw", "sql10799402");
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// 2. CREATE (Add student)
if(isset($_POST['create'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO students (name, email) VALUES ('$name','$email')";
    if($conn->query($sql)){
        echo "✅ Student added successfully!";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}

// 3. READ (Get all students)
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <h2 class="mb-3">Student List</h2>

    <!-- Form to add student -->
    <form method="POST" class="mb-3">
        <input type="text" name="name" placeholder="Enter name" required>
        <input type="email" name="email" placeholder="Enter email" required>
        <button type="submit" name="create" class="btn btn-success">Add</button>
    </form>

    <!-- Student table -->
    <table class="table table-bordered">
        <tr><th>ID</th><th>Name</th><th>Email</th></tr>
        <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
