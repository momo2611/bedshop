<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/base.css" />
    <title>Bedtime || Blogs</title>
</head>

<body>
    <?php include 'components/navbar.php'; ?>

    <div class="heading">
        <h3>My Blog</h3>
        <p> <a href="home.php">Home</a> / Blog </p>
    </div>
    <!-- Blog container -->
    <div class="blog-container">
        <div class="grid">
            <div class="blog-wrap">
                <!-- blog box -->
                <div class="blog-box">
                    <div class="blog-img">
                        <img src="./assets/img/Huntington_Outdoor_Wicker_Featured_Thumb.png" alt="">
                    </div>
                    <div class="blog-text">
                        <span>31 March 2022 / Inspiration</span>
                        <a href="#" class="blog-title">
                            Unlike Ordinary Outdoor Collections, Bassett is Built to Last
                        </a>
                        <p class="blog-decs">Bassett’s 100-year legacy of quality is reflected in our stylish outdoor
                            furniture; made with the best materials and artisan craftsmanship you can find.</p>
                        <a href="#" class="blog-read">Read More</a>
                    </div>
                </div>
                <!-- blog box -->
                <div class="blog-box">
                    <div class="blog-img">
                        <img src="./assets/img/color_20211.jpg" alt="">
                    </div>
                    <div class="blog-text">
                        <span>14 April 2022 / Inside Look</span>
                        <a href="#" class="blog-title">
                            Color Trends for 2021 - Home, Fabric, and Furniture
                        </a>
                        <p class="blog-decs">The top trending colors for 2021 mirror the emotions and desires of our
                            time: comfort, peace, hope, mindfulness, and optimism. From deep, rich tones to all-out
                            neutrals and pops of color, it’s easy to start out your year with a new look.</p>
                        <a href="#" class="blog-read">Read More</a>
                    </div>
                </div>
                <!-- blog box -->
                <div class="blog-box">
                    <div class="blog-img">
                        <img src="./assets/img/2951-K159D-Shoreline-FA1811.jpg" alt="">
                    </div>
                    <div class="blog-text">
                        <span>2 May 2022 / Decorating</span>
                        <a href="#" class="blog-title">
                            6 Easy Ways to Refresh Your Home Using Accessories
                        </a>
                        <p class="blog-decs">Here’s 6 top designer tips for quickly changing up any room. Hit the ‘Refresh’ button and give your space an easy update!</p>
                        <a href="#" class="blog-read">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
    <script src="js/index.js"></script>
</body>

</html>