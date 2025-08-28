<?php
session_start();
require 'db.php';
require 'auth.php';
require_role(['admin','staff']);

$msg = '';

// Add Class
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $desc = $_POST['description'];
    $schedule = $_POST['schedule_time'];
    $trainer_id = $_POST['trainer_id'];
    $capacity = $_POST['capacity'];

    $stmt = $conn->prepare("INSERT INTO classes (name,category,description,schedule_time,trainer_id,capacity) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssii",$name,$category,$desc,$schedule,$trainer_id,$capacity);
    $stmt->execute();
    $msg = "Class added successfully!";
}

// Delete Class
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM classes WHERE id=$id");
    header("Location: manage_classes.php");
}

$classes = $conn->query("SELECT classes.*, trainers.name AS trainer_name FROM classes LEFT JOIN trainers ON classes.trainer_id = trainers.id");
$trainers = $conn->query("SELECT * FROM trainers");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Classes</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="section container">
    <h2>Manage Classes</h2>
    <?php if($msg) echo "<p class='alert ok'>$msg</p>"; ?>
    <form method="post" class="form">
        <input type="text" name="name" placeholder="Class Name" required>
        <input type="text" name="category" placeholder="Category (Cardio/Yoga/etc)" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="text" name="schedule_time" placeholder="Schedule Time" required>
        <select name="trainer_id" required>
            <option value="">Select Trainer</option>
            <?php while($t = $trainers->fetch_assoc()): ?>
                <option value="<?php echo $t['id'];?>"><?php echo htmlspecialchars($t['name']);?></option>
            <?php endwhile; ?>
        </select>
        <input type="number" name="capacity" placeholder="Capacity" required>
        <button type="submit" name="add" class="btn-submit">Add Class</button>
    </form>

    <table class="table">
        <tr>
            <th>ID</th><th>Name</th><th>Category</th><th>Trainer</th><th>Schedule</th><th>Capacity</th><th>Action</th>
        </tr>
        <?php while($row = $classes->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo htmlspecialchars($row['name']);?></td>
            <td><?php echo htmlspecialchars($row['category']);?></td>
            <td><?php echo htmlspecialchars($row['trainer_name']);?></td>
            <td><?php echo htmlspecialchars($row['schedule_time']);?></td>
            <td><?php echo $row['capacity'];?></td>
            <td><a href="?delete=<?php echo $row['id'];?>" onclick="return confirmDelete();">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</section>

</body>
</html>
