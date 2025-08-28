<?php 
include '../includes/db.php'; 
session_start(); 
if ($_SESSION['role'] != 'staff') { header('Location: ../pages/login.php'); exit(); }
?>

<h2>Welcome Staff Member</h2>
<a href="../pages/logout.php">Logout</a>

<h3>Upcoming Appointments</h3>
<?php
$result = mysqli_query($conn, "SELECT * FROM appointments ORDER BY date, time");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div>Customer ID: {$row['user_id']} | {$row['service']} - {$row['date']} @ {$row['time']}</div><hr>";
}
?>

<h3>Customer Queries</h3>
<?php
$result = mysqli_query($conn, "SELECT * FROM queries");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div><strong>{$row['subject']}</strong><p>{$row['message']}</p><hr></div>";
}
?>
