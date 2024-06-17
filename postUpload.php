<?php
include 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $stmt = $conn->prepare("INSERT INTO posts (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);
    if ($stmt->execute()) {
        header('location: posts.php');
        exit;
    } else {
        echo "Error: " . $conn->error;
    } $stmt->close();
} $conn->close();
?>
