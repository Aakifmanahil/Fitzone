<?php
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include header
include("../includes/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - FitZone</title>
    <style>
        .appointment-container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .appointment-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e1e2f;
        }
        .appointment-container label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        .appointment-container input, 
        .appointment-container select, 
        .appointment-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        .appointment-container button {
            background: #1e1e2f;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }
        .appointment-container button:hover {
            background: #4da6ff;
        }
    </style>
</head>
<body>
    <div class="appointment-container">
        <h2>Book an Appointment</h2>
        <form action="process_appointment.php" method="POST">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" required>

            <label for="phone">Phone Number</label>
            <input type="text" name="phone" id="phone" required>

            <label for="date">Preferred Date</label>
            <input type="date" name="date" id="date" required>

            <label for="time">Preferred Time</label>
            <input type="time" name="time" id="time" required>

            <button type="submit">Book Appointment</button>
        </form>
    </div>
</body>
</html>
