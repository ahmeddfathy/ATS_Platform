<?php
include('conn.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM schools WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header('location: schools.php');
        exit;
    } else {
        echo "Error deleting image: " . $conn->error;
    }
} else {
    echo "Invalid request.";
} $conn->close();
?>
