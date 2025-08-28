<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FitZone</title>
  <link rel="stylesheet" href="/fitzone/assets/style.css"> <!-- adjust if needed -->
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6ff;
      color: #1e1e2f;
    }
    header {
      background: #1e1e2f;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 {
      color: #4da6ff;
      margin: 0;
    }
    nav {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    nav a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    nav a:hover {
      color: #ffdd57;
    }
  </style>
</head>
<body>
  <header>
    <h1>FitZone</h1>
    <nav>
      <a href="/fitzone/index.php">Home</a>
      <a href="/fitzone/about.php">About</a>
      <a href="/fitzone/blog/blog.php">Blogs</a>
      <a href="/fitzone/pages/membership.php">Membership</a>
      <a href="/fitzone/contact.php">Contact</a>
      <a href="/fitzone/pages/appointments.php">Appointments</a>

      <?php if (isset($_SESSION['user_id'])): ?>
          <!-- User is logged in -->
          <a href="/fitzone/pages/logout.php">Logout</a>
      <?php else: ?>
          <!-- Guest user -->
          <a href="/fitzone/pages/login.php">Login</a>
          <a href="/fitzone/pages/register.php">Register</a>
      <?php endif; ?>
    </nav>
  </header>
