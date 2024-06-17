<?php
include('conn.php');
session_start();
if(!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
} 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM schools WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $school = $result->fetch_assoc();
        $image_data = $school['image_data'];
        $image_type = $school['image_type'];
        $base64_image = 'data:' . $image_type . ';base64,' . base64_encode($image_data);
    } else {
        header("Location: schools.php");
        exit();
    }
} else {
    header("Location: schools.php");
    exit();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css"> 
    <link rel= "icon" href="imgs/developer.png" type="image/x-icon"/>
    <script 
    type="module" 
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js">
    </script>
    <style>
        .profile-container {
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px 2px rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            padding: 20px;
            margin-top: 20px;
        }
        .profile-picture {
            border-radius: 50%;
            max-width: 100%;
            height: auto;
            border: 4px solid #fff; 
        }
    </style>
    <title>ATS</title>
</head>
<body>
    <div class="container">
    <div class="profile-container mt-4 mb-4 p-4">
    <div class="row">
        <div class="col-md-3 offset-md-1">
            <img src='<?php echo $base64_image; ?>' class="profile-picture img-fluid">
        </div>
        <div class="col-md-7">
            <h1 class="mb-4 mt-4" style="font-weight:bold;"><?php echo $school['school_name']; ?></h1>
            <p>Years: <?php echo $school['years']; ?> Years</p>
            <p>Specialties: <?php echo $school['fields']; ?></p>
            <p>Phone: <?php echo $school['phone']; ?> </p>
            <p>Email: <?php echo $school['email']; ?></p>
            <p>Branches: <?php echo $school['branches']; ?></p>
            <p class="lead"><?php echo $school['description']; ?></p>
            <div class="mt-4 mb-4">
                <?php if (!empty($school['facebook_link'])): ?>
                    <a href="<?php echo $school['facebook_link']; ?>" target="_blank"><ion-icon name="logo-facebook" size="large" style="margin-right:10px;"></ion-icon></a>
                <?php endif; ?>
                <?php if (!empty($school['instagram_link'])): ?>
                    <a href="<?php echo $school['instagram_link']; ?>" target="_blank"><ion-icon name="logo-instagram" size="large" style="margin-right:10px;"></ion-icon></a>
                <?php endif; ?>
                <?php if (!empty($school['twitter_link'])): ?>
                    <a href="<?php echo $school['twitter_link']; ?>" target="_blank"><ion-icon name="logo-twitter" size="large" style="margin-right:10px;"></ion-icon></a>
                <?php endif; ?>
                <?php if (!empty($school['whatsapp_group_link'])): ?>
                    <a href="<?php echo $school['whatsapp_group_link']; ?>" target="_blank"><ion-icon name="logo-whatsapp" size="large"></ion-icon></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <a href="schools.php" class="btn btn-primary">Back</a>
</div>
    </div>
</body>
</html>
