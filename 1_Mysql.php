<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
  header("Location: dashboard.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Perform login validation here (validate against the database)
  // Replace the following code with actual database validation

  $username = $_POST['username'];
  $password = $_POST['password'];

  // Simulating database query (Replace with actual database query)
  $db_username = 'john_doe'; // Replace with the actual username from the database
  $db_password = 'password123'; // Replace with the actual password from the database
  $db_user_type = 'student'; // Replace with 'student' or 'staff' based on the user from the database

  if ($username === $db_username && $password === $db_password) {
    $_SESSION['user_id'] = 1; // Replace with the actual user_id from the database
    $_SESSION['user_type'] = $db_user_type;
    header("Location: dashboard.php");
    exit();
  } else {
    $error_message = "Invalid username or password";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login - Attendance Management System</title>
</head>
<body>
  <h1>Login</h1>
  <?php if (isset($error_message)) { ?>
    <p><?php echo $error_message; ?></p>
  <?php } ?>

  <form method="post">
    <label>Username:</label>
    <input type="text" name="username" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Login">
  </form>
</body>
</html>
