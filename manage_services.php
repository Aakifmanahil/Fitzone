<?php
session_start();

// Only allow admin
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}

// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db   = "fitzone_db"; // your DB name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Handle add service
if (isset($_POST['add'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = floatval($_POST['price']);
    $conn->query("INSERT INTO services (name, description, price) VALUES ('$name', '$description', '$price')");
    header("Location: manage_services.php");
    exit();
}

// Handle delete service
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM services WHERE id = $id");
    header("Location: manage_services.php");
    exit();
}

// Fetch all services
$result = $conn->query("SELECT * FROM services");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Services | Admin Dashboard</title>
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
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background: #349244;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background: #2a7537;
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

<h1>Manage Services</h1>

<!-- Add Service Form -->
<form method="post">
    <h3>Add New Service</h3>
    <input type="text" name="name" placeholder="Service Name" required>
    <textarea name="description" placeholder="Service Description" required></textarea>
    <input type="number" step="0.01" name="price" placeholder="Price" required>
    <button type="submit" name="add">Add Service</button>
</form>

<!-- Service Table -->
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price (LKR)</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['description']); ?></td>
            <td><?= number_format($row['price'], 2); ?></td>
            <td>
                <a href="manage_services.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Delete this service?');">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<a href="admin_dashboard.php" class="back">⬅ Back to Dashboard</a>

</body>
</html>

