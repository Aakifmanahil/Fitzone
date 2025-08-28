<?php
session_start();
require 'db.php';
require 'auth.php';
require_role(['admin','staff']);

$msg = '';

// Add Trainer
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $cert = $_POST['certifications'];
    $spec = $_POST['specialties'];
    $bio = $_POST['bio'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO trainers (name,certifications,specialties,bio,price_per_session) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssssd",$name,$cert,$spec,$bio,$price);
    $stmt->execute();
    $msg = "Trainer added successfully!";
}

// Delete Trainer
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM trainers WHERE id=$id");
    header("Location: manage_trainers.php");
}

$trainers = $conn->query("SELECT * FROM trainers");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Trainers</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="section container">
    <h2>Manage Trainers</h2>
    <?php if($msg) echo "<p class='alert ok'>$msg</p>"; ?>
    <form method="post" class="form">
        <input type="text" name="name" placeholder="Trainer Name" required>
        <input type="text" name="certifications" placeholder="Certifications" required>
        <input type="text" name="specialties" placeholder="Specialties" required>
        <textarea name="bio" placeholder="Bio" required></textarea>
        <input type="number" step="0.01" name="price" placeholder="Price per session" required>
        <button type="submit" name="add" class="btn-submit">Add Trainer</button>
    </form>

    <table class="table">
        <tr>
            <th>ID</th><th>Name</th><th>Certifications</th><th>Specialties</th><th>Price</th><th>Action</th>
        </tr>
        <?php while($row = $trainers->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo htmlspecialchars($row['name']);?></td>
            <td><?php echo htmlspecialchars($row['certifications']);?></td>
            <td><?php echo htmlspecialchars($row['specialties']);?></td>
            <td><?php echo $row['price_per_session'];?></td>
            <td><a href="?delete=<?php echo $row['id'];?>" onclick="return confirmDelete();">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</section>

</body>
</html>
