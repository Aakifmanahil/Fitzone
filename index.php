<?php
session_start();
require 'db.php'; // Database connection to fetch trainers, classes, blog posts
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FitZone Fitness Center</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="logo">FitZone</div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="classes.php">Classes</a></li>
        <li><a href="trainers.php">Trainers</a></li>
        <li><a href="membership.php">Membership</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="contact.php">Contact</a></li>

        <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="logout.php">Logout (<?php echo htmlspecialchars($_SESSION['user_name']); ?>)</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</div>

<!-- Hero Section -->
<section class="section hero">
    <img src="images/hero.jpg" alt="FitZone Hero" style="width:100%; border-radius:8px;">
    <div class="hero-text">
        <h1>Welcome to FitZone Fitness Center</h1>
        <p>Start your journey to a healthier, stronger you today!</p>
    </div>
</section>

<!-- Classes Section -->
<section class="section container">
    <h2>Our Classes</h2>
    <div class="grid cols-3">
        <?php
        $classes = $conn->query("SELECT classes.*, trainers.name AS trainer_name FROM classes LEFT JOIN trainers ON classes.trainer_id = trainers.id LIMIT 3");
        while($row = $classes->fetch_assoc()):
        ?>
        <div class="card">
            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($row['category']); ?></p>
            <p><strong>Trainer:</strong> <?php echo htmlspecialchars($row['trainer_name']); ?></p>
            <p><?php echo htmlspecialchars($row['description']); ?></p>
            <p><strong>Schedule:</strong> <?php echo htmlspecialchars($row['schedule_time']); ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Trainers Section -->
<section class="section container">
    <h2>Meet Our Trainers</h2>
    <div class="grid cols-3">
        <?php
        $trainers = $conn->query("SELECT * FROM trainers LIMIT 3");
        while($t = $trainers->fetch_assoc()):
        ?>
        <div class="card">
            <img src="images/trainer<?php echo $t['id']; ?>.jpg" alt="<?php echo htmlspecialchars($t['name']); ?>">
            <h3><?php echo htmlspecialchars($t['name']); ?></h3>
            <p><strong>Specialties:</strong> <?php echo htmlspecialchars($t['specialties']); ?></p>
            <p><?php echo htmlspecialchars($t['bio']); ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Blog Section -->
<section class="section container">
    <h2>Latest Blog Posts</h2>
    <div class="grid cols-3">
        <?php
        $blogs = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT 3");
        while($b = $blogs->fetch_assoc()):
        ?>
        <div class="card">
            <?php if($b['image']): ?>
            <img src="uploads/<?php echo $b['image']; ?>" alt="<?php echo htmlspecialchars($b['title']); ?>">
            <?php endif; ?>
            <h3><?php echo htmlspecialchars($b['title']); ?></h3>
            <p><?php echo substr($b['content'],0,100); ?>...</p>
        </div>
        <?php endwhile; ?>
    </div>
</section>

</body>
</html>
