<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}
/* Checking if the product_id is set. If it is, it will set the variable `` to the value of
the product_id. */
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // detail
    $product_id_detail = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'") or die('query failed');
    $count = mysqli_num_rows($product_id_detail);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($product_id_detail);
        $name = $row['name'];
        $category = $row['category'];
        $description = $row['description'];
        $price = $row['price'];
        $image = $row['image'];
        if (isset($_POST['add_to_cart'])) {

            $name = $row['name'];
            $price = $row['price'];
            $image = $row['image'];
            $quantity = $_POST['quantity'];

            $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$name' AND user_id = '$user_id'") or die('query failed');

            if (mysqli_num_rows($check_cart_numbers) > 0) {
                $message[] = 'Product added to cart already!';
            } else {
                mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$name', '$price', '$quantity', '$image')") or die('query failed');
                $message[] = 'Product added to cart!';
            }
        }
    } else {
        header('location:product.php');
    }
} else {
    header('location:product.php');
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
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/base.css" />
    <title>DreamBed || Product</title>
</head>

<body>
    <?php include 'components/navbar.php'; ?>

    <div class="heading">
        <h3>Product detail</h3>
        <p> <a href="product.php">Product</a> / <?php echo $name; ?> </p>
    </div>
    <!-- product container -->
    <form action="" method="post">
        <div class="product-detail-container">
            <div class="grid">
                <div class="grid-row">
                    <div class="grid__column-2-3 product-img-box">
                        <img src="assets/img/<?php echo $image; ?>" alt="">
                    </div>
                    <div class="grid__column-2-7 product-detail-section">
                        <h2><?php echo $name; ?></h2>
                        <div class="product-detail-price">$<?php echo $price; ?></div>
                        <div class="product-detail-description"><p><?php echo $description; ?></p></div>
                        <div class="product-detail-info">
                            <p class="info-category">
                                <label>Category:</label>
                                <span><a href="product-cat.php?category=<?php echo $category; ?>"><?php echo $category; ?></a></span>
                            </p>
                            <p class="info-inventory">
                                <label>Availability:</label>
                                <span>Many In Stock</span>
                            </p>
                        </div>
                        <input style="display:none;" type="number" min="1" name="quantity" value="1" class="qty">
                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <input type="hidden" name="image" value="<?php echo $image; ?>">
                        <input type="submit" class="btn-slider" value="Add to cart" name="add_to_cart">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end product container -->
    <section class="product-container">
        <div class="grid">
            <h1 class="title">Similar Products</h1>

            <div class="grid-row">

                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE category = '$category' LIMIT 5 ") or die('query failed');
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

    <?php include 'components/footer.php'; ?>
    <script src="js/index.js"></script>
</body>

</html>