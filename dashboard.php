<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include('db.php');
$user_id = $_SESSION['user_id'];

// Fetch user posts
$sql = "SELECT * FROM posts WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome to your Dashboard</h2>
        <a href="create_post.php">Create a New Post</a>
        <h3>Your Blog Posts</h3>

        <?php while($row = $result->fetch_assoc()): ?>
            <div class="post">
                <h4><a href="view_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                <p><?php echo substr($row['content'], 0, 100); ?>...</p>
                <small>Created at: <?php echo $row['created_at']; ?></small>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
