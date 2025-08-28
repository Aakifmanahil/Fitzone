<?php
session_start();
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - FitZone</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="section container">
    <h2>Blog Posts</h2>
    <div class="grid cols-3">
        <?php
        $res = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
        while($row = $res->fetch_assoc()):
        ?>
        <div class="card">
            <img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" style="width:100%; border-radius:8px;">
            <h3><?php echo htmlspecialchars($row['title']); ?></h3>
            <p><?php echo substr(htmlspecialchars($row['content']),0,150).'...'; ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</section>

</body>
</html>
