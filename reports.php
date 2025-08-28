<?php
session_start();
include("../includes/db.php"); // adjust path if your db connection file is in another folder

// Only allow admin access
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}

// Fetch total users
$userQuery = "SELECT COUNT(*) as total_users FROM users";
$userResult = mysqli_query($conn, $userQuery);
$userRow = mysqli_fetch_assoc($userResult);

// Fetch total services
$serviceQuery = "SELECT COUNT(*) as total_services FROM services";
$serviceResult = mysqli_query($conn, $serviceQuery);
$serviceRow = mysqli_fetch_assoc($serviceResult);

// Fetch total bookings
$bookingQuery = "SELECT COUNT(*) as total_bookings FROM appointments";
$bookingResult = mysqli_query($conn, $bookingQuery);
$bookingRow = mysqli_fetch_assoc($bookingResult);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reports | FitZone</title>
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
        .reports {
            max-width: 900px;
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
            margin-bottom: 10px;
            color: #349244;
        }
        .card p {
            font-size: 20px;
            font-weight: bold;
        }
        .back {
            text-align: center;
            margin-top: 30px;
        }
        .back a {
            color: #349244;
            text-decoration: none;
            font-weight: bold;
        }
        .back a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <h1>Reports & Statistics 📊</h1>
</header>

<div class="reports">
    <div class="card">
        <h2>Total Users</h2>
        <p><?php echo $userRow['total_users']; ?></p>
    </div>
    <div class="card">
        <h2>Total Services</h2>
        <p><?php echo $serviceRow['total_services']; ?></p>
    </div>
    <div class="card">
        <h2>Total Bookings</h2>
        <p><?php echo $bookingRow['total_bookings']; ?></p>
    </div>
</div>

<div class="back">
    <a href="admin_dashboard.php">⬅ Back to Dashboard</a>
</div>

</body>
</html>
