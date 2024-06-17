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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel= "icon" href="imgs/developer.png" type="image/x-icon"/>
    <title>ATS</title>
    <style>
        .card {
            box-shadow: 0 4px 6px 5px rgba(0, 0, 0, 0.3);
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
            <form class="d-flex ml-auto" action="" method="POST" role="search">
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
            <a href="schools.php" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
<?php
include 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST['search_query'];
    $search_query = mysqli_real_escape_string($conn, $search_query);
    $sql = "SELECT * FROM schools WHERE school_name LIKE '%$search_query%'";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    if ($result->num_rows > 0) {
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
            $base64_image = 'data:' . $image_type . ';base64,' . base64_encode($image_data); ?>
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="width: 16rem; border-radius:20px;">
                            <img src='<?php echo $base64_image; ?>' class="card-img-top p-4" style="border-radius:20px;">
                            <div class="card-body">
                                <h3>School Name</h3>
                                <p><?php echo  $schoolName; ?></p>
                                <h3>About</h3>
                                <p class="card-text"><?php echo $description; ?></p>
                                <!-- Links with Icons -->
                                <div class="mt-4">
                                <center>
                                <?php if (!empty($row['facebook_link'])) : ?>
                                <a href="<?php echo $row['facebook_link']; ?>" class="text-primary" target="_blank" title="Facebook">
                                    <ion-icon name="logo-facebook" size="large" style="margin-right:10px;"></ion-icon>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($row['instagram_link'])) : ?>
                                <a href="<?php echo $row['instagram_link']; ?>" class="text-primary" target="_blank" title="Instagram">
                                    <ion-icon name="logo-instagram" size="large" style="margin-right:10px;"></ion-icon>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($row['twitter_link'])) : ?>
                                <a href="<?php echo $row['twitter_link']; ?>" class="text-primary" target="_blank" title="Twitter">
                                    <ion-icon name="logo-twitter" size="large" style="margin-right:10px;"></ion-icon>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($row['whatsapp_group_link'])) : ?>
                                <a href="<?php echo $row['whatsapp_group_link']; ?>" class="text-primary" target="_blank" title="WhatsApp Group">
                                    <ion-icon name="logo-whatsapp" size="large"></ion-icon>
                                </a>
                            <?php endif; ?>
                            </center>
                                    <!-- Add more links as needed -->
                                </div>
                                <!-- End of Links with Icons -->
                                <a href="schoolShow.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary w-100 mt-4">Show</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "<h4 class='text-light mt-4 p-5'>No matching schools found.</h4>";
    } $conn->close();
} ?>
<script 
type="module" 
src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
