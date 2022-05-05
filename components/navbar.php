<?php
$user_id = $_SESSION['user_id'];
if (isset($message)) {
  foreach ($message as $message) {
    echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
  }
}
?>

<!-- Nav bar -->
<div class="header-container">
  <div class="grid">
    <nav>
      <div class="menu-left">
        <a class="header" href="home.php">DreamBed</a>
      </div>
      <!-- menu center start -->
      <div class="menu-center">
        <ul class="site-nav">
          <li>
            <a href="home.php">Home</a>
          </li>
          <li><a href="product.php">Products</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="blog.php">Blog</a></li>
        </ul>
      </div>
      <!-- menu center end -->
      <!-- menu right start -->
      <div class="menu-right">
        <ul class="menu-icon">
          <li>
            <a href="cart.php">
              <img src="./assets/svgs/solid/cart-plus.svg" alt="" />
              <span>
                (<?php 
                  $count_product = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                  $count = mysqli_num_rows($count_product);
                  echo $count;  ?>)
              </span>
            </a>
          </li>
          <li class="menu-icon-user">
            <a><img src="./assets/svgs/solid/user-circle.svg" alt="" /></a>
            <ul class="setting-dropdown dropdown-user">
              <li class="dropdown-item">
                <a class="non-select">Username: <?php echo $_SESSION['user_name']; ?></a>
                <a href="logout.php">Log out</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- menu right end -->
      <!-- hamburger icon -->
      <button class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <!-- side bar mobile -->
      <div class="nav-mobile">
        <ul class="dropdown-nav-mobile">
          <li><a href="home.php">Home</a></li>
          <li><a href="product.php">Products</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="blog.php">Blog</a></li>
          <div class="menu-right-mobile">
            <a href="cart.php"><img src="./assets/svgs/solid/cart-plus.svg" alt="" /></a>
            <a href="logout.php"><img src="./assets/svgs/solid/user-circle.svg" alt="" /></a>
          </div>
        </ul>
      </div>
      <!-- end side bar mobile -->
    </nav>
  </div>
</div>
<!-- end nav bar -->