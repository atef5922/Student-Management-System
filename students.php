<?php
require 'db.php';

// Add Student
if (isset($_POST['add'])) {
  $id = $_POST['student_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  mysqli_query($conn, "INSERT INTO students (student_id, name, email, phone) VALUES ('$id', '$name', '$email', '$phone')");
}

// Delete Student
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM students WHERE id=$id");
}

// Update Student
if (isset($_POST['update'])) {
  $row_id = $_POST['id'];
  $id = $_POST['student_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  mysqli_query($conn, "UPDATE students SET student_id='$id', name='$name', email='$email', phone='$phone' WHERE id=$row_id");
  header("Location: students.php");
}

// Edit Mode Prefill
$edit_data = null;
if (isset($_GET['edit'])) {
  $edit_id = $_GET['edit'];
  $res = mysqli_query($conn, "SELECT * FROM students WHERE id=$edit_id");
  $edit_data = mysqli_fetch_assoc($res);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Management</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Student Management</h1>
  <nav>
    <a href="index.php">Home</a> |
    <a href="students.php">Student Management</a> |
    <a href="about.php">About</a> |
    <a href="contact.php">Contact</a>
  </nav>

  <form method="POST">
    <input type="hidden" name="id" value="<?php echo $edit_data['id'] ?? ''; ?>">
    <input type="text" name="student_id" placeholder="Student ID" required value="<?php echo $edit_data['student_id'] ?? ''; ?>">
    <input type="text" name="name" placeholder="Name" required value="<?php echo $edit_data['name'] ?? ''; ?>">
    <input type="email" name="email" placeholder="Email" required value="<?php echo $edit_data['email'] ?? ''; ?>">
    <input type="text" name="phone" placeholder="Phone Number" required value="<?php echo $edit_data['phone'] ?? ''; ?>">
    <button type="submit" name="<?php echo $edit_data ? 'update' : 'add'; ?>">
      <?php echo $edit_data ? 'Update' : 'Add'; ?> Student
    </button>
  </form>

  <table>
    <tr><th>ID</th><th>Student ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM students");
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['student_id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['phone']}</td>
        <td>
          <a href='students.php?edit={$row['id']}'>Edit</a>
          <a href='students.php?delete={$row['id']}'>Delete</a>
        </td>
      </tr>";
    }
    ?>
  </table>
</body>
</html>