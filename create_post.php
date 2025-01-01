<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include('db.php');
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts (user_id, title, content) VALUES ('$user_id', '$title', '$content')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Post created successfully! <a href='dashboard.php'>Go back to dashboard</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Create a New Blog Post</h2>
        <form method="POST">
            <input type="text" name="title" placeholder="Post Title" required><br>
            <textarea name="content" placeholder="Post Content" required></textarea><br>
            <button type="submit">Create Post</button>
        </form>
    </div>
</body>
</html>
