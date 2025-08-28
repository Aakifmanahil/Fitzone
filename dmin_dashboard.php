<?php 
include '../includes/db.php'; 
session_start(); 
if ($_SESSION['role'] != 'admin') { header('Location: ../pages/login.php'); exit(); }
?>

<h2>Welcome Admin</h2>
<a href="../pages/logout.php">Logout</a>

<h3>Registered Users</h3>
<?php
$result = mysqli_query($conn, "SELECT * FROM users");
echo "<ul>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>{$row['name']} - {$row['email']} ({$row['role']})</li>";
}
echo "</ul>";
?>

<h3>Customer Queries</h3>
<?php
$result = mysqli_query($conn, "SELECT * FROM queries");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div><strong>{$row['subject']}</strong><p>{$row['message']}</p><hr></div>";
}
?>

<h3>Appointments</h3>
<?php
$result = mysqli_query($conn, "SELECT * FROM appointments");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div>Service: {$row['service']}, Date: {$row['date']}, Time: {$row['time']}</div>";
}
?>
