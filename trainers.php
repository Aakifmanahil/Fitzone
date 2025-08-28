<?php
session_start();
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trainers - FitZone Fitness Center</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="section container">
    <h2>Our Trainers</h2>
    <div class="grid cols-3">
        <?php
        $res = $conn->query("SELECT * FROM trainers");
        while($row = $res->fetch_assoc()):
        ?>
        <div class="card">
            <img src="images/trainer<?php echo $row['id']; ?>.jpg" alt="<?php echo htmlspecialchars($row['name']); ?>" style="width:100%; border-radius:8px;">
            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
            <p><strong>Certifications:</strong> <?php echo htmlspecialchars($row['certifications']); ?></p>
            <p><strong>Specialties:</strong> <?php echo htmlspecialchars($row['specialties']); ?></p>
            <p><strong>Price per session:</strong> $<?php echo htmlspecialchars($row['price_per_session']); ?></p>
            <p><?php echo htmlspecialchars($row['bio']); ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</section>

</body>
</html>
