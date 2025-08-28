<?php
session_start();

// Only allow admin
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}

// Database connection (adjust if needed)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "fitzone_db"; // your database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Handle delete user
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM users WHERE id = $id");
    header("Location: manage_users.php");
    exit();
}

// Fetch all users
$result = $conn->query("SELECT id, name, email, role FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users | Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6ff;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #349244;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #349244;
            color: white;
        }
        tr:hover {
            background: #f1f1f1;
        }
        .delete-btn {
            color: white;
            background: #d8000c;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
        }
        .delete-btn:hover {
            background: #a40009;
        }
        .back {
            margin-top: 20px;
            display: inline-block;
            background: #349244;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
        }
        .back:hover {
            background: #2a7537;
        }
    </style>
</head>
<body>

<h1>Manage Users</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['role']); ?></td>
            <td>
                <a href="manage_users.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<a href="admin_dashboard.php" class="back">⬅ Back to Dashboard</a>

</body>
</html>

