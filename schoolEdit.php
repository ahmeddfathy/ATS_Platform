<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: home.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>
    <link rel= "icon" href="imgs/developer.png" type="image/x-icon"/>
    <title>ATS</title>
    <style>
        .form-container {
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.4);
            padding: 20px;
            border-radius: 20px;
            margin-top: 20px;
        }
        .dynamic-inputs-container {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    include 'conn.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM schools WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <div class="container mt-5 form-container">
        <form action="schoolUpdate.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="school_name">School Name:</label>
                    <input type="text" class="form-control" id="school_name" name="school_name" value="<?php echo $row['school_name']; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="years">Years:</label>
                    <input type="number" class="form-control" id="years" name="years" value="<?php echo $row['years']; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="school_image">School Image:</label>
                <input type="file" class="form-control-file" name="school_image">
            </div>
            <div class="form-group">
                <label for="branches">Branches:</label>
                <input type="text" class="form-control" id="branches" name="branches" value="<?php echo $row['branches']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" rows="3" name="description" required><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="fields">Specialities:</label>
                <input type="text" class="form-control" id="fields" name="fields" value="<?php echo $row['fields']; ?>" required>
            </div>
            <div class="form-group">
                <label for="facebook_link">Facebook Link:</label>
                <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="<?php echo $row['facebook_link']; ?>">
            </div>
            <div class="form-group">
                <label for="instagram_link">Instagram Link:</label>
                <input type="text" class="form-control" id="instagram_link" name="instagram_link" value="<?php echo $row['instagram_link']; ?>">
            </div>
            <div class="form-group">
                <label for="twitter_link">Twitter Link:</label>
                <input type="text" class="form-control" id="twitter_link" name="twitter_link" value="<?php echo $row['twitter_link']; ?>">
            </div>
            <div class="form-group">
                <label for="whatsapp_group_link">WhatsApp Group Link:</label>
                <input type="text" class="form-control" id="whatsapp_group_link" name="whatsapp_group_link" value="<?php echo $row['whatsapp_group_link']; ?>">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
            <a href="schools.php" class="btn btn-outline-primary mt-3">Back</a>
        </form>
    </div>
    <?php
        } else {
            echo "School not found.";
        }
    } else {
        echo "Invalid request.";
    } $conn->close();
    ?>
</body>
</html>
