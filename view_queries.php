<?php
session_start();
require 'db.php';
require 'auth.php';
require_role(['admin','staff']);

if(isset($_GET['resolve'])){
    $id = intval($_GET['resolve']);
    $conn->query("UPDATE queries SET resolved=1 WHERE id=$id");
    header("Location: view_queries.php");
}

$queries = $conn->query("SELECT * FROM queries ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Queries</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="section container">
    <h2>Customer Queries</h2>
    <table class="table">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Resolved</th><th>Action</th>
        </tr>
        <?php while($row = $queries->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo htmlspecialchars($row['name']);?></td>
            <td><?php echo htmlspecialchars($row['email']);?></td>
            <td><?php echo htmlspecialchars($row['subject']);?></td>
            <td><?php echo htmlspecialchars($row['message']);?></td>
            <td><?php echo $row['resolved'] ? 'Yes':'No';?></td>
            <td>
                <?php if(!$row['resolved']): ?>
                <a href="?resolve=<?php echo $row['id'];?>" onclick="return confirmDelete('Mark as resolved?');">Resolve</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</section>

</body>
</html>
