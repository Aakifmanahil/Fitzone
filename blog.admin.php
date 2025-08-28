<?php
session_start();
require 'db.php';
require 'auth.php';
require_role(['admin','staff']);

$msg = '';

if(isset($_POST['add'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    $img_name = '';
    if(isset($_FILES['image']) && $_FILES['image']['error']==0){
        $img_name = time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$img_name);
    }

    $stmt = $conn->prepare("INSERT INTO blog_posts (title,content,image) VALUES (?,?,?)");
    $stmt->bind_param("sss",$title,$content,$img_name);
    $stmt->execute();
    $msg = "Blog post added!";
}

if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM blog_posts WHERE id=$id");
    header("Location: blog_admin.php");
}

$blogs = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Blog</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="section container">
    <h2>Manage Blog Posts</h2>
    <?php if($msg) echo "<p class='alert ok'>$msg</p>"; ?>
    <form method="post" enctype="multipart/form-data" class="form">
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="content" placeholder="Content" required></textarea>
        <input type="file" name="image" accept="image/*">
        <button type="submit" name="add" class="btn-submit">Add Blog Post</button>
    </form>

    <table class="table">
        <tr>
            <th>ID</th><th>Title</th><th>Image</th><th>Action</th>
        </tr>
        <?php while($row = $blogs->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo htmlspecialchars($row['title']);?></td>
            <td>
                <?php if($row['image']): ?>
                <img src="uploads/<?php echo $row['image'];?>" style="width:100px;"/>
                <?php endif; ?>
            </td>
            <td><a href="?delete=<?php echo $row['id'];?>" onclick="return confirmDelete();">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</section>

</body>
</html>
