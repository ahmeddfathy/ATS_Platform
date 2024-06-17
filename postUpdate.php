<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['id'], $_POST['title'], $_POST['description'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $sql = "UPDATE posts SET title = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $description, $id);
        if ($stmt->execute()) {
            $stmt->close();
            header('location: posts.php');
            exit;
        } else {
            echo "Error updating post: " . $stmt->error;
        }
    } else {
        echo "Incomplete data provided.";
    }
} else {
    echo "Invalid request.";
} $conn->close();
?>
