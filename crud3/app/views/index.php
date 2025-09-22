<?php
include '../database.php';

$sql = "SELECT * FROM students";  // palitan depende sa table name mo
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>              
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #121212;
      color: #e5e5e5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h2 {
      font-weight: 600;
      color: #00ff88;
    }

    .card {
      border-radius: 1rem;
      overflow: hidden;
      background: #1e1e1e;
      border: none;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
    }

    .table thead {
      background: #00ff88;
      color: #121212;
    }

    .table tbody tr {
      background: #1e1e1e;
      color: #e5e5e5;
    }

    .table tbody tr:hover {
      background: #2a2a2a;
    }

    .btn-success {
      border-radius: 30px;
      padding: 6px 18px;
      background: #00ff88;
      border: none;
      color: #121212;
      font-weight: 600;
    }

    .btn-success:hover {
      background: #00cc6a;
      color: #fff;
    }

    .btn-primary {
      border-radius: 25px;
      background: #007bff;
      border: none;
    }

    .btn-danger {
      border-radius: 25px;
      background: #dc3545;
      border: none;
    }

    .btn-secondary {
      border-radius: 25px;
      background: #444;
      border: none;
    }

    .badge {
      cursor: pointer;
      font-size: 0.85rem;
      padding: 8px 14px;
      border-radius: 30px;
    }

    .pagination .page-link {
      color: #00ff88;
      background: transparent;
      border-radius: 50% !important;
      margin: 0 4px;
      border: 1px solid #00ff88;
    }
    .pagination .page-link:hover {
      background-color: #00ff88;
      color: #121212;
    }
    .pagination .active .page-link {
      background-color: #00ff88;
      border-color: #00ff88;
      color: #121212;
    }

    .modal-content {
      border-radius: 1rem;
      border: none;
      background: #1e1e1e;
      color: #e5e5e5;
    }
    .modal-header {
      border-bottom: none;
    }
    .modal-footer {
      border-top: none;
    }

    .form-control {
      background: #2a2a2a;
      border: 1px solid #444;
      color: #e5e5e5;
    }

    .form-control:focus {
      background: #2a2a2a;
      border-color: #00ff88;
      box-shadow: 0 0 0 0.25rem rgba(0, 255, 136, 0.25);
      color: #fff;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4 text-center">📚 Student Records</h2>

  <!-- Error & Message Section -->
  <div class="mb-3">
    <?php // getErrors(); ?>
    <?php // getMessage(); ?>
  </div>

  <!-- Search + Add Student -->
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
    <form action="" method="get" class="d-flex col-sm-12 col-md-6 mb-2 mb-md-0">
      <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
      <input 
        class="form-control me-2" 
        name="q" 
        type="text" 
        placeholder="🔍 Search student..." 
        value="<?= htmlspecialchars($q); ?>">
      <button type="submit" class="btn btn-success">Search</button>
    </form>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">+ Add Student</button>
  </div>

  <!-- Student Table -->
  <div class="card shadow">
    <div class="card-body">
      <table class="table table-hover text-center align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Course</th>
          </tr>
        </thead>
        <tbody>
          <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= htmlspecialchars($row['id']); ?></td>
                <td><?= htmlspecialchars($row['student_id']); ?></td>
                <td><?= htmlspecialchars($row['first_name']); ?></td>
                <td><?= htmlspecialchars($row['last_name']); ?></td>
                <td><?= htmlspecialchars($row['course']); ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-muted">No students found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="create.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title text-success">➕ Add Student</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Student ID</label>
            <input type="text" name="student_id" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Course</label>
            <input type="text" name="course" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Add</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL; ?>/public/js/alert.js"></script>
</body>
</html>
  