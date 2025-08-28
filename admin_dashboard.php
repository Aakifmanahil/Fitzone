<?php
session_start();

// Only allow admin access
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | FitZone</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6ff;
            color: #333;
        }
        header {
            background: #349244;
            color: white;
            padding: 20px;
            text-align: center;
        }
        header h1 {
            margin: 0;
        }
        .dashboard {
            max-width: 1100px;
            margin: 40px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h2 {
            margin-bottom: 15px;
            color: #349244;
        }
        .card a {
            display: inline-block;
            padding: 10px 20px;
            background: #349244;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            margin-top: 10px;
        }
        .card a:hover {
            background: #2a7537;
        }
        .logout {
            text-align: center;
            margin-top: 30px;
        }
        .logout a {
            color: #d8000c;
            text-decoration: none;
            font-weight: bold;
        }
        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome, Admin <?php echo $_SESSION["name"]; ?> 👋</h1>
</header>

<div class="dashboard">
    <div class="card">
        <h2>Manage Users</h2>
        <p>View and manage all registered users.</p>
        <a href="manage_users.php">Go</a>
    </div>
    <div class="card">
        <h2>Manage Services</h2>
        <p>Add, edit, or delete fitness programs.</p>
        <a href="manage_services.php">Go</a>
    </div>
    <div class="card">
        <h2>View Bookings</h2>
        <p>Check and approve customer bookings.</p>
        <a href="manage_bookings.php">Go</a>
    </div>
    <div class="card">
        <h2>Reports</h2>
        <p>View activity and performance reports.</p>
        <a href="reports.php">Go</a>
    </div>
</div>

<div class="logout">
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
