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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/base.css" />
    <title>Bedtime || Home</title>
</head>

<body>
    <div id="progress">
        <span id="progress-value">&#x1F815;</span>
    </div>
    <?php include 'components/navbar.php'; ?>

    <?php include 'components/slider.php'; ?>

    <section class="product-container">
        <div class="grid">
            <h1 class="title">New Collection Arrival</h1>

            <div class="grid-row">

                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE category = 'Charlotte' LIMIT 5 ") or die('query failed');
                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                ?>
                        <!-- Product item -->
                        <div class="grid__column-2-4">
                            <div class="home-product-item">
                                <div class="product-item-img">
                                    <img src="assets/img/<?php echo $fetch_products['image']; ?>">
                                </div>
                                <h4 class="product-item-name"><?php echo $fetch_products['name']; ?></h4>
                                <div class="product-item-price">
                                    <span class="price-current">$<?php echo $fetch_products['price']; ?>/-</span>
                                </div>
                                <div class="view-container">
                                    <a class="btn-view" href="detail.php?product_id=<?php echo $fetch_products['id']; ?>">view details</a>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>



    <section class="product-container">
        <div class="grid">
            <h1 class="title">Latest Products</h1>

            <div class="grid-row">

                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products` ORDER BY id DESC LIMIT 5") or die('query failed');
                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                ?>
                        <!-- Product item -->
                        <div class="grid__column-2-4">
                            <div class="home-product-item">
                                <div class="product-item-img">
                                    <img src="assets/img/<?php echo $fetch_products['image']; ?>">
                                </div>
                                <h4 class="product-item-name"><?php echo $fetch_products['name']; ?></h4>
                                <div class="product-item-price">
                                    <span class="price-current">$<?php echo $fetch_products['price']; ?>/-</span>
                                </div>
                                <div class="view-container">
                                    <a class="btn-view" href="detail.php?product_id=<?php echo $fetch_products['id']; ?>">view details</a>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->
                <?php
                    }
                }
                ?>
            </div>

            <div class="load-more">
                <a href="product.php" class="btn-view">watch more</a>
            </div>
        </div>

    </section>

    <?php include 'components/about.php'; ?>

    <?php include 'components/footer.php'; ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/index.js"></script>
</body>

</html>