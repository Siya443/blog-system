<?php
include('db.php');

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id = '$post_id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        echo "Post not found.";
    }
} else {
    echo "Invalid post ID.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="post-container">
        <h2><?php echo $post['title']; ?></h2>
        <p><?php echo nl2br($post['content']); ?></p>
        <small>Created at: <?php echo $post['created_at']; ?></small>
    </div>
</body>
</html>
