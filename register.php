<?php 
include '../includes/db.php'; 
session_start(); 
include '../includes/header.php'; 
?>

<style>
/* Styles are kept as in your current design */
* { box-sizing: border-box; }

.wrapper {
    display: flex;
    max-width: 960px;
    margin: 70px auto;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
    background-color: white;
}

.image-side {
    flex: 1;
    background: url('../IMAGES/register-fit.jpg') no-repeat center center;
    background-size: cover;
}

.form-side {
    flex: 1;
    padding: 40px;
    animation: slideIn 0.8s ease;
}

@keyframes slideIn {
    from { transform: translateY(40px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

h2 {
    text-align: center;
    color: #1e90ff;
    margin-bottom: 30px;
}

input {
    width: 100%;
    padding: 14px;
    margin-top: 16px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
}

input:focus {
    border-color: #1e90ff;
    box-shadow: 0 0 8px rgba(30, 144, 255, 0.2);
    outline: none;
}

input[type="submit"] {
    background-color: #1e90ff;
    color: white;
    border: none;
    font-weight: bold;
    cursor: pointer;
    margin-top: 25px;
    transition: background-color 0.3s, transform 0.2s ease;
}

input[type="submit"]:hover {
    background-color: #4682b4;
    transform: translateY(-2px);
}

.message {
    margin-top: 25px;
    padding: 14px;
    border-radius: 10px;
    font-weight: bold;
    animation: fadeIn 0.6s ease;
}

.success {
    background-color: #d4edda;
    color: #155724;
    border-left: 6px solid #28a745;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    border-left: 6px solid #dc3545;
}

a {
    color: #1e90ff;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

@media (max-width: 768px) {
    .wrapper {
        flex-direction: column;
    }
    .image-side {
        height: 250px;
    }
}
</style>

<div class="wrapper">
    <div class="image-side"></div>
    <div class="form-side">
        <h2>Create Your FitZone Account</h2>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="register" value="Register">
        </form>

        <?php
        if (isset($_POST['register'])) {
            $name     = mysqli_real_escape_string($conn, $_POST['name']);
            $email    = mysqli_real_escape_string($conn, $_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashed password
            $role     = 'user'; // default role

            // Check if email exists
            $checkEmail = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
            if (mysqli_num_rows($checkEmail) > 0) {
                echo "<div class='message error'>Email already exists. Try another one.</div>";
            } else {
                $query = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
                if (mysqli_query($conn, $query)) {
                    echo "<div class='message success'>Registration successful! <a href='login.php'>Login now</a>.</div>";
                } else {
                    echo "<div class='message error'>Something went wrong. Please try again later.</div>";
                }
            }
        }
        ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
