<?php
/* This is a PHP code that is used to check if the user is logged in or not. If the user is not logged
in, it will redirect the user to the login page. */

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:login.php');
}
if (!isset($_GET['category_name'])){
    $category_name = $_GET['category'];
    $category_detail = mysqli_query($conn, "SELECT * FROM `products` WHERE category = '$category_name'") or die('query failed');
    $count = mysqli_num_rows($category_detail); 
    if($count == 1){
        $row = mysqli_fetch_assoc($category_detail);
        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image'];
    }
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
  <title>Bedtime || Product</title>
</head>

<body>
  <div id="progress">
    <span id="progress-value">&#x1F815;</span>
  </div>
  <?php include 'components/navbar.php'; ?>
  <div class="heading">
    <h3><?php echo $category_name; ?></h3>
    <p> <a href="home.php">Home</a> / Product </p>
  </div>
  <!-- main container home -->
  <div class="main-product-container">
    <div class="grid">
      <!-- category-container -->
      <div class="category-container">
        <div class="category-header">
          <h4>shop by category</h4>
        </div>
        <ul class="cat-list">
          <li class="cat-item"><a href="product.php">All</a></li>
          <?php
          /* Used to fetch all the categories from the database. */
          $select_products = mysqli_query($conn, "SELECT DISTINCT category FROM `products`") or die('query failed');
          if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
          ?>
              <li class="cat-item">
                <a href="product-cat.php?category=<?php echo $fetch_products['category'] ?>"><?php echo $fetch_products['category'] ?></a>
              </li>
          <?php }
          } ?>
        </ul>
      </div>
      <!-- product-container -->
      <div class="product-container">
        <div class="grid__row">
          <?php
          /* This is a PHP code that is used to fetch all the products from the database. */
          $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE category = '$category_name' ") or die('query failed');
          if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
          ?>
              <!-- Product item -->
              <div class="grid__column-2-4 item-separate <?php echo $fetch_products['category'] ?>">
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
          <?php }
          } ?>

        </div>
      </div>
    </div>
  </div>
  <!-- end main container home -->
  <?php include 'components/footer.php'; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="js/index.js"></script>
</body>
</html>