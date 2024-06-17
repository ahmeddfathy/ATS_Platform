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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel= "icon" href="imgs/developer.png" type="image/x-icon"/>
    <title>ATS</title>
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
            </ul>
            <a class="btn btn-light" href="logout.php" style="border-radius:30px;">logout</a>
        </div>
    </div>
</nav>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-light" style="font-weight:bold;">Posts</h1>
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
                <a class="btn btn-primary" href='dashboard.php'>Post</a>
            <?php } ?>
            <a href="home.php" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
<?php
include 'conn.php';
$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}
if ($result->num_rows > 0) {
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $description = $row['description'];
        ?>
        <?php if ($count % 3 == 0) : ?>
            <div class="container mt-5">
                <div class="row">
        <?php endif; ?>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-4">
                        <div class="card" style="width: 16rem; border-radius:20px;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $title; ?></h5>
                                <p class="card-text"><?php echo $description; ?></p>
                                <?php if ($_SESSION['role'] === 'admin') { ?>
                                    <form action="postDelete.php?id=<?php echo $row['id']; ?>" method="post"
                                        onsubmit="return confirm('Are you sure to delete this post?')">
                                        <a href='postEdit.php?id=<?php echo  $row["id"]; ?>'
                                        class="btn btn-primary w-50">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                <?php } ?>
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
    echo "<h4 class='text-light mt-4 p-5'>No Posts Yet.</h4>";
}
$conn->close();
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
