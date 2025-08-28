<?php
session_start();
require 'db.php';
$msg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO queries (name,email,subject,message) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss",$name,$email,$subject,$message);

    if($stmt->execute()){
        $msg = "Your query has been submitted successfully!";
    } else {
        $msg = "Error: ".$conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact - FitZone</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="section container">
    <h2>Contact Us</h2>
    <?php if($msg) echo "<p class='alert ok'>$msg</p>"; ?>
    <form method="post" class="form">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" placeholder="Message" required></textarea>
        <button type="submit" class="btn-submit">Send Message</button>
    </form>
</section>

</body>
</html>
