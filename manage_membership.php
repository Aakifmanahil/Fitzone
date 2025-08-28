<?php
session_start();
require 'db.php';
require 'auth.php';
require_role(['admin']);

$msg = '';

if(isset($_POST['add'])){
    $plan = $_POST['plan_name'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $benefits = $_POST['benefits'];

    $stmt = $conn->prepare("INSERT INTO memberships (plan_name,duration_months,price,benefits) VALUES (?,?,?,?)");
    $stmt->bind_param("siis",$plan,$duration,$price,$benefits);
    $stmt->execute();
    $msg = "Membership plan added successfully!";
}

if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM memberships WHERE id=$id");
    header("Location: manage_memberships.php");
}

$memberships = $conn->query("SELECT * FROM memberships");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Memberships</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="section container">
    <h2>Manage Memberships</h2>
    <?php if($msg) echo "<p class='alert ok'>$msg</p>"; ?>
    <form method="post" class="form">
        <input type="text" name="plan_name" placeholder="Plan Name" required>
        <input type="number" name="duration" placeholder="Duration (months)" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <textarea name="benefits" placeholder="Benefits" required></textarea>
        <button type="submit" name="add" class="btn-submit">Add Membership</button>
    </form>

    <table class="table">
        <tr>
            <th>ID</th><th>Plan Name</th><th>Duration</th><th>Price</th><th>Benefits</th><th>Action</th>
        </tr>
        <?php while($row = $memberships->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo htmlspecialchars($row['plan_name']);?></td>
            <td><?php echo $row['duration_months'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo htmlspecialchars($row['benefits']);?></td>
            <td><a href="?delete=<?php echo $row['id'];?>" onclick="return confirmDelete();">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</section>

</body>
</html>

