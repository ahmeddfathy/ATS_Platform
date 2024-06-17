<?php
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
        header("Location: home.php");
        exit(); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATS</title>
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel= "icon" href="imgs/developer.png" type="image/x-icon"/>
</head>
<body>
<?php
include 'conn.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <div class="container mt-5">
            <form action='postUpdate.php' method='post' enctype='multipart/form-data'>
                <input type='hidden' name='id' value='<?php echo $id; ?>'>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type='text' name='title' value='<?php echo $row['title']; ?>' class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name='description' class="form-control" id="description" rows="5" required><?php echo $row['description']; ?></textarea>
                    <div class="invalid-feedback">
                        Please provide a description.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="posts.php" class="btn btn-outline-primary">Back</a>
            </form>
        </div>
<?php
    } else {
        echo "Post not found.";
    }
} else {
    echo "Invalid request.";
} $conn->close();
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
