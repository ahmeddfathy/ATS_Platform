<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        header("Location: login.php");
        exit();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATS</title>
    <link rel= "icon" href="imgs/developer.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .card {
            box-shadow: 0 4px 6px 3px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body style="background-color:#26335D;">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <h3 class="navbar-brand text-light" style="font-size:27px; font-weight:bold;">ATS</h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <form class="d-flex ml-auto" action="searchEngine.php" method="POST" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_query">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-light" style="font-weight:bold;">Schools Of Future</h1>
            <br>
            <p class="text-light">Problems trying to resolve the conflict between <br>
                the two major realms of Classical physics: Newtonian mechanics </p>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <?php
            if ($_SESSION['role'] === 'admin') { ?>
                <a class="btn btn-primary" href='dashboard.php'>Add New School</a>
            <?php } ?>
            <a href="home.php" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
<?php
include 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image_data = file_get_contents($_FILES['school_image']['tmp_name']);
    $image_type = $_FILES['school_image']['type'];
    $description = $_POST['description'];
    $schoolName = $_POST['school_name'];
    $years = $_POST['years'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $branches = $_POST['branches'];
    $fields = $_POST['fields'];
    $sql = "INSERT INTO schools(image_data, image_type, school_name, years, email, phone, branches, fields, description) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $image_data, $image_type, $schoolName, $years, $email, $phone, $branches, $fields, $description);
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }
    $stmt->close();
}
$sql = "SELECT * FROM schools ORDER BY id DESC";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}
if ($result->num_rows > 0) {
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        $image_data = $row['image_data'];
        $image_type = $row['image_type'];
        $description = $row['description'];
        $schoolName = $row['school_name'];
        $years = $row['years'];
        $email = $row['email'];
        $phone = $row['phone'];
        $branches = $row['branches'];
        $fields = $row['fields'];
        $base64_image = 'data:' . $image_type . ';base64,' . base64_encode($image_data);
?>
        <?php if ($count % 3 == 0) : ?>
            <div class="container mt-5">
                <div class="row">
        <?php endif; ?>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-4">
                        <div class="card" style="width: 16rem; border-radius:20px;">
                                <img src='<?php echo $base64_image; ?>' class="card-img-top p-4" style="border-radius:20px;">
                            <div class="card-body">
                                <h3>School Name</h3>
                                <p><?php echo  $schoolName; ?></p>
                                <h3>About</h3>
                                <p class="card-text"><?php echo $description; ?></p>
                                <div class="d-flex justify-content-around mb-2 mt-4">
                                    <?php if (!empty($row['facebook_link'])) : ?>
                                        <a href="<?php echo $row['facebook_link']; ?>" class="text-primary" target="_blank" title="Facebook">
                                            <ion-icon name="logo-facebook" size="large"></ion-icon>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($row['instagram_link'])) : ?>
                                        <a href="<?php echo $row['instagram_link']; ?>" class="text-primary" target="_blank" title="Instagram">
                                            <ion-icon name="logo-instagram" size="large"></ion-icon>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($row['twitter_link'])) : ?>
                                        <a href="<?php echo $row['twitter_link']; ?>" class="text-primary" target="_blank" title="Twitter">
                                            <ion-icon name="logo-twitter" size="large"></ion-icon>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($row['whatsapp_group_link'])) : ?>
                                        <a href="<?php echo $row['whatsapp_group_link']; ?>" class="text-primary" target="_blank" title="WhatsApp Group">
                                            <ion-icon name="logo-whatsapp" size="large"></ion-icon>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <?php if ($_SESSION['role'] === 'admin') : ?>
                                    <form action="schoolDelete.php?id=<?php echo $row['id']; ?>" method="post" onsubmit="return confirm('Are you sure to delete this image?')" >
                                        <a href='schoolEdit.php?id=<?php echo $row['id']; ?>' class="btn btn-primary w-50">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                <?php endif; ?>
                                <a href="schoolShow.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary w-100 mt-4">Show</a>
                            </div>
                        </div>
                    </div>
        <?php if ($count % 3 == 2 || $count == $result->num_rows - 1) : ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
        $count++;
    }
} else {
    echo "<h4 class='text-light mt-4 p-5'>No Schools found.</h4>";
}$conn->close();
?>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
