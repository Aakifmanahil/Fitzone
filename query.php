<?php 
include '../includes/db.php'; 
session_start(); 
include '../includes/header.php'; 
?>

<style>
    * {
        box-sizing: border-box;
    }

    header {
        background: linear-gradient(to right, #1e1e2f, #333354);
        padding: 30px 20px;
        color: white;
        text-align: center;
        animation: fadeSlideDown 1s ease-in-out;
    }

    @keyframes fadeSlideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .container {
        max-width: 750px;
        margin: 60px auto;
        background: #ffffff;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1s ease-in;
    }

    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    h2 {
        color: #1e90ff; /* Cool blue color */
        margin-bottom: 25px;
        font-size: 26px;
        text-align: center;
    }

    input, textarea {
        width: 100%;
        padding: 14px;
        margin-top: 15px;
        border-radius: 10px;
        border: 1px solid #ccc;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    input:focus,
    textarea:focus {
        border-color: #1e90ff; /* Cool blue border */
        box-shadow: 0 0 8px rgba(30, 144, 255, 0.3);
        outline: none;
    }

    input[type="submit"] {
        background-color: #1e90ff; /* Cool blue background */
        color: white;
        font-weight: bold;
        border: none;
        margin-top: 25px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="submit"]:hover {
        background-color: #4682b4; /* Darker blue on hover */
        transform: translateY(-2px);
    }

    .message {
        margin-top: 25px;
        padding: 15px;
        font-weight: bold;
        border-radius: 10px;
        animation: fadeIn 0.5s ease-in;
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

    @media (max-width: 768px) {
        .container {
            margin: 30px 15px;
            padding: 30px 20px;
        }
    }
</style>

<header>
    <h1>Submit a Query to FitZone Management</h1>
</header>

<div class="container">
    <h2>We're here to help!</h2>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" rows="6" placeholder="Write your message here..." required></textarea>
        <input type="submit" name="submit" value="Send Query">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

        if ($user_id !== NULL) {
            $query = "INSERT INTO queries (user_id, name, email, subject, message) 
                      VALUES ('$user_id', '$name', '$email', '$subject', '$message')";
        } else {
            $query = "INSERT INTO queries (name, email, subject, message) 
                      VALUES ('$name', '$email', '$subject', '$message')";
        }

        if (mysqli_query($conn, $query)) {
            echo "<div class='message success'>Your query has been submitted successfully!</div>";
        } else {
            echo "<div class='message error'>Something went wrong. Please try again later.</div>";
        }
    }
    ?>
</div>

<?php include '../includes/footer.php'; ?>
