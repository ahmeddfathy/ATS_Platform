<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $schoolName = $_POST['school_name'];
    $years = $_POST['years'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $branches = $_POST['branches'];
    $fields = $_POST['fields'];
    $description = $_POST['description'];
    $facebookLink = $_POST['facebook_link'];
    $instagramLink = $_POST['instagram_link'];
    $twitterLink = $_POST['twitter_link'];
    $whatsappGroupLink = $_POST['whatsapp_group_link'];
    $sql = "UPDATE schools SET ";
    $params = [];
    if (isset($_FILES['school_image']) && $_FILES['school_image']['size'] > 0) {
        $sql .= "image_data = ?, image_type = ?, ";
        $params[] = $_FILES['school_image']['tmp_name'];
        $params[] = $_FILES['school_image']['type'];
    }
    $sql .= "school_name = ?, years = ?, email = ?, phone = ?, branches = ?, fields = ?, description = ?, facebook_link = ?, instagram_link = ?, twitter_link = ?, whatsapp_group_link = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $params = array_merge([$schoolName, $years, $email, $phone, $branches, $fields, $description, $facebookLink, $instagramLink, $twitterLink, $whatsappGroupLink, $id], $params);
        $paramTypes = str_repeat('s', count($params));
        $stmt->bind_param($paramTypes, ...$params);
        if ($stmt->execute()) {
            header('location: schools.php');
            exit;
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid request.";
} $conn->close();
?>
