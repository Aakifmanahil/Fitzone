<?php
session_start();
include '../includes/db.php'; // adjust path if needed

// Only process form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    // Fetch user by email
    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Check password
        if (password_verify($password, $user["password"])) {
            // Set session variables
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["name"]    = $user["name"];
            $_SESSION["role"]    = $user["role"] ?? 'user'; // default to user if empty

            // Redirect based on role
            if ($_SESSION["role"] === "admin") {
                header("Location: admin_dashboard.php"); // go to admin dashboard
            } else {
                header("Location: home.php"); // go to normal user home
            }
            exit(); // very important
        } else {
            $error = "Invalid email or password!";
        }
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | FitZone</title>
    <style>
        body {
            margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif;
            background: url('../IMAGES/background-image.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .login-box {
            width: 400px; margin: 80px auto; padding: 40px;
            background: rgba(255,255,255,0.95); border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        .login-box h2 { text-align: center; color: #349244; margin-bottom: 20px; }
        .login-box input[type="email"], .login-box input[type="password"] {
            width: 100%; padding: 14px; margin: 12px 0; border: 1px solid #ccc; border-radius: 10px;
        }
        .login-box input[type="submit"] {
            background-color: #3e9131; color: white; font-weight: bold; border: none;
            border-radius: 10px; padding: 14px; margin-top: 20px; cursor: pointer;
        }
        .login-box input[type="submit"]:hover { background-color: #35903e; }
        .error {
            background-color: #fce4e4; color: #d8000c; padding: 12px; border-radius: 10px;
            margin-top: 20px; text-align: center;
        }
        .register-link { text-align: center; margin-top: 25px; }
        .register-link a { color: #00ff04; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login to FitZone</h2>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Email address" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>

    <?php if (!empty($error)) { echo "<div class='error'>$error</div>"; } ?>

    <div class="register-link">
        Don't have an account? <a href="register.php">Register</a>
    </div>
</div>

</body>
</html>
