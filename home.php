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
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>
    <link rel="stylesheet" href="style/style.css">
    <link rel= "icon" href="imgs/developer.png" type="image/x-icon"/>
</head>
<body style="background-color:#26335D;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <h3 class="navbar-brand text-light" style="font-size:27px; font-weight:bold;">ATS</h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#" style="margin-right:15px;">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="schools.php" style="margin-right:15px;">Schools</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="posts.php" style="margin-right:15px;">Posts</a>
            </li>
            
            <?php
            if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                echo '<li class="nav-item">
                        <a class="nav-link text-light" href="dashboard.php">Dashboard</a>
                        </li>';
            }?>
        </ul>
        <a class="btn btn-light" href="logout.php" style="border-radius:20px; width:100px;">logout</a>
        </div>
    </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <h5 class="text-primary" id="text">Welcome</h5>
                <h1 class="text-light" id="txt">Best Learning<br>
                Operation</h1>
                <br>
                <p class="text-light" style="font-size:17px;">Every day brings with it a fresh set of <br> learning possibilities.</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <img src="imgs/img1.svg" class="img-fluid mt-5">
            </div>
        </div>
    </div>
    <center>
    <div class="container mt-5" >
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                <h1 class="text-primary" id="content">45</h1>
                <br>
                <p class="text-light">School</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                <h1 class="text-primary" id="content">150K</h1>
                <br>
                <p class="text-light">Student</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                <h1 class="text-primary" id="content">250</h1>
                <br>
                <p class="text-light">Branch</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                <h1 class="text-primary" id="content">2k+</h1>
                <br>
                <p class="text-light">Graduate</p>
            </div>
        </div>
    </div>
    </center>
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-12">
            <h1 class="text-light" id="field">What Is The Fields</h1>
            <br>
            <p class="text-light">
            Problems trying to resolve the conflict between <br> 
            the two major realms of Classical physics: Newtonian mechanics
            </p>
            </div>
        </div>
    </div>
        <center>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <div class="card mb-4" style="width: 16rem; border-radius:20px;">
            <img src="imgs/icon1.svg" class="card-img-top" id="img">
            <div class="card-body">
            <h5 class="card-title">Communication</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <div class="card mb-4" style="width: 16rem; border-radius:20px;">
            <img src="imgs/icon2.svg" class="card-img-top" id="img">
            <div class="card-body">
                <h5 class="card-title">Technologies</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <div class="card mb-4" style="width: 16rem; border-radius:20px;">
            <img src="imgs/icon3.svg" class="card-img-top"  id="img">
            <div class="card-body">
                <h5 class="card-title">Science</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <div class="card mb-4" style="width: 16rem; border-radius:20px;">
            <img src="imgs/icon4.svg" class="card-img-top" id="img">
            <div class="card-body">
                <h5 class="card-title">Programming</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            </div>
            </div>
        </div>
    <div>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <h5 class="text-primary" id="text">Schools</h5>
                <h1 class="text-light" id="field">Some Schools</h1>
                <br>
                <p class="text-light">
                Problems trying to resolve the conflict between <br> 
                the two major realms of Classical physics: Newtonian mechanics
                </p>
            </div>
        </div>
    </div>
    <center>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card mb-5" style="width: 16rem; border-radius:20px;">
                <img class="card-img-top" src="imgs/we.svg" style="border-radius:20px; padding:30px;">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card mb-5" style="width: 16rem; border-radius:20px;">
                <img class="card-img-top" src="imgs/elaraby.svg" style="border-radius:20px; padding:30px;">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card mb-5" style="width: 16rem; border-radius:20px;">
                    <img class="card-img-top" src="imgs/swedy.svg" style="border-radius:20px; padding:30px;">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="schools.php" class="btn btn-primary mt-5 mb-5">Learn More</a>
            </div>
        </div>
    </div>
    <center>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <p class="text-primary mt-5" id="text">Newsletter</p>
            <h1 class="mt-3 text-light" id="text">Our Recurses</h1>
            <p class="mt-3 text-light">Problems trying to resolve the conflict between <br> 
            the two major realms of Classical physics: Newtonian mechanics </p>
            </div>
        </div>
    </div>
    </center>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <form class="input-group mb-3"  method="POST" action="home.php">
            <input type="email" class="form-control" placeholder="Enter The Email" aria-label="Recipient's username" aria-describedby="basic-addon2" name="email">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Subscribe</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light text-dark mt-5">
        <div class="row justify-content-around ">
            <div class="col-12">
                <center>
                <p class="p-2">&copy; 2024 Applied Tech | All Rights Reserved.</p>
                </center>
            </div>
        </div>
    </div> 
    <?php
        include 'conn.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            if (empty($email)) {
                echo "<script>alert('Please enter an Email address!')</script>";
                die();
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<script>alert('Invalid email format! Please reenter your Email Address.')</script>";													  
                    die();
                    echo "<script>alert('Invalid email format! Please reenter your Email Address.')</script>";
                }else{
                    $sql = "SELECT * FROM subscribers WHERE email='$email'";
                    $result = mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($result);
                    if($count==0){
                        $sql2 = "INSERT INTO `subscribers` (`email`) VALUES ('$email');";
                        if(mysqli_query($conn,$sql2)){
                            echo "<script>alert('You have successfully Subscribed to our Newsletter!')</script>";
                            echo '<script>window.location.href = "home.php"</script>';
                        }else{
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }else{
                        echo "<script>alert('This email has already been registered!')</script>";
                        echo '<script>window.location.href = "home.php"</script>';
                    }                            
                }          
            }
        }
    ?>

</body>
</html>