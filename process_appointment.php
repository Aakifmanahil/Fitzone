<?php
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database connection
$host = "localhost";
$user = "root";   // default for WAMP
$pass = "";       // default is empty for WAMP
$dbname = "fitzone_db";  // your database name

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $date  = $conn->real_escape_string($_POST['date']);
    $time  = $conn->real_escape_string($_POST['time']);

    // Insert into database
    $sql = "INSERT INTO appointments (name, email, phone, date, time) 
            VALUES ('$name', '$email', '$phone', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back with success
        header("Location: appointments.php?success=1");
        exit();
    } else {
        // Redirect back with error
        header("Location: appointments.php?error=1");
        exit();
    }
}

$conn->close();
?>
