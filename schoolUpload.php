<?php
include 'conn.php';
if (isset($_FILES['school_image'])) {
    $image_data = file_get_contents($_FILES['school_image']['tmp_name']);
    $image_type = $_FILES['school_image']['type'];
    $schoolName = $_POST['school_name'];
    $years = $_POST['years'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $branches = $_POST['branches'];
    $fields = $_POST['fields'];
    $description = $_POST['description'];
    $facebookLink = isset($_POST['facebook_link']) ? $_POST['facebook_link'] : "";
    $instagramLink = isset($_POST['instagram_link']) ? $_POST['instagram_link'] : "";
    $twitterLink = isset($_POST['twitter_link']) ? $_POST['twitter_link'] : "";
    $whatsappGroupLink = isset($_POST['whatsapp_group_link']) ? $_POST['whatsapp_group_link'] : "";

    $stmt = $conn->prepare("INSERT INTO schools(image_data, image_type, school_name, years, email, phone, branches, fields, description, facebook_link, instagram_link, twitter_link, whatsapp_group_link) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss", $image_data, $image_type, $schoolName, $years, $email, $phone, $branches, $fields, $description, $facebookLink, $instagramLink, $twitterLink, $whatsappGroupLink);
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    } 
    $stmt->close();
    header('location: schools.php');
    exit;
} $conn->close();
?>
