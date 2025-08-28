<?php
session_start();
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classes - FitZone Fitness Center</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; // Optional: extract navbar into separate file ?>

<section class="section container">
    <h2>Our Classes</h2>
    <div class="grid cols-3">
        <?php
        $res = $conn->query("SELECT classes.*, trainers.name AS trainer_name FROM classes LEFT JOIN trainers ON classes.trainer_id = trainers.id");
        while($row = $res->fetch_assoc()):
        ?>
        <div class="card" style="background:#fff; padding:15px; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,.1);">
            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
            <p><?php echo htmlspecialchars($row['description']); ?></p>
            <p><strong>Trainer:</strong> <?php echo htmlspecialchars($row['trainer_name']); ?></p>
            <p><strong>Schedule:</strong> <?php echo htmlspecialchars($row['schedule_time']); ?></p>
            <p><strong>Capacity:</strong> <?php echo htmlspecialchars($row['capacity']); ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</section>

</body>
</html>
