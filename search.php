<?php
// pages/search.php

// Database connection
$host = "localhost";
$user = "root"; // default for WAMP
$pass = "";
$dbname = "fitzone_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search term
$q = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - FitZone</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6ff;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #1e1e2f;
        }
        .result {
            background: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .no-result {
            color: #999;
        }
    </style>
</head>
<body>

<?php include("../includes/header.php"); ?> <!-- ✅ Keep navbar on search page -->

<h1>Search Results for "<?php echo htmlspecialchars($q); ?>"</h1>

<?php
if ($q != '') {
    // Search Users
    $sql_users = "SELECT id, username, email FROM users WHERE username LIKE '%$q%' OR email LIKE '%$q%'";
    $res_users = $conn->query($sql_users);

    // Search Blogs
    $sql_blogs = "SELECT id, title, content FROM blogs WHERE title LIKE '%$q%' OR content LIKE '%$q%'";
    $res_blogs = $conn->query($sql_blogs);

    // Search Memberships
    $sql_memberships = "SELECT id, plan_name, description FROM memberships WHERE plan_name LIKE '%$q%' OR description LIKE '%$q%'";
    $res_memberships = $conn->query($sql_memberships);

    // Search Appointments
    $sql_appointments = "SELECT id, name, service FROM appointments WHERE name LIKE '%$q%' OR service LIKE '%$q%'";
    $res_appointments = $conn->query($sql_appointments);

    // Show results
    if ($res_users->num_rows > 0) {
        echo "<h2>Users</h2>";
        while ($row = $res_users->fetch_assoc()) {
            echo "<div class='result'><strong>{$row['username']}</strong> ({$row['email']})</div>";
        }
    }

    if ($res_blogs->num_rows > 0) {
        echo "<h2>Blogs</h2>";
        while ($row = $res_blogs->fetch_assoc()) {
            echo "<div class='result'><strong>{$row['title']}</strong><br>" . substr($row['content'], 0, 100) . "...</div>";
        }
    }

    if ($res_memberships->num_rows > 0) {
        echo "<h2>Memberships</h2>";
        while ($row = $res_memberships->fetch_assoc()) {
            echo "<div class='result'><strong>{$row['plan_name']}</strong><br>{$row['description']}</div>";
        }
    }

    if ($res_appointments->num_rows > 0) {
        echo "<h2>Appointments</h2>";
        while ($row = $res_appointments->fetch_assoc()) {
            echo "<div class='result'><strong>{$row['name']}</strong> - {$row['service']}</div>";
        }
    }

    if (
        $res_users->num_rows == 0 &&
        $res_blogs->num_rows == 0 &&
        $res_memberships->num_rows == 0 &&
        $res_appointments->num_rows == 0
    ) {
        echo "<p class='no-result'>No results found.</p>";
    }
} else {
    echo "<p class='no-result'>Please enter a search term.</p>";
}

$conn->close();
?>

</body>
</html>
