<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
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
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: home.php");
    exit();
} ?>
    <div class="container mt-5 mb-5 form-container">
    <form action="schoolUpload.php" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="firstName">School Name:</label>
            <input type="text" class="form-control" id="firstName" placeholder="School Name" name="school_name" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="lastName">Years:</label>
            <input type="number" class="form-control" id="lastName" placeholder="Years" name="years" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" placeholder="Phone Number" name="phone" required>
        </div>
    </div>
    <div class="form-group">
        <label for="">School Image:</label>
        <input type="file" class="form-control-file" name="school_image" required>
    </div>
    <div class="form-group">
        <label for="address">Branches:</label>
        <input type="text" class="form-control" id="address" placeholder="Branches" name="branches" required>
    </div>
    <div class="form-group">
        <label for="message">Description:</label>
        <textarea class="form-control" id="message" rows="3" placeholder="Description" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="message">Specialities:</label>
        <input class="form-control" placeholder="Fields" name="fields" required>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="facebook">Facebook Link:</label>
                <input type="url" class="form-control" id="facebook" placeholder="Facebook Link" name="facebook_link">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="instagram">Instagram Link:</label>
                <input type="url" class="form-control" id="instagram" placeholder="Instagram Link" name="instagram_link">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="twitter">Twitter Link:</label>
                <input type="url" class="form-control" id="twitter" placeholder="Twitter Link" name="twitter_link">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="whatsapp">WhatsApp Group Link:</label>
                <input type="url" class="form-control" id="whatsapp" placeholder="WhatsApp Group Link" name="whatsapp_group_link">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Add</button>
    <button type="button" class="btn btn-dark mt-3" data-toggle="modal" data-target="#exampleModalCenter">
        Add New Post
    </button>
    <a href="home.php" class="btn btn-outline-primary mt-3">Back</a>
</form>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="postUpload.php" method="POST" enctype="multipart/form-data">
                        title:
                        <input type="text" name="title" class="form-control">
                        <br>
                        Description:
                        <textarea rows="4" cols="50" name="description" class="form-control" placeholder="Description" required></textarea>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div> 
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
