<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

if (!isset($user_id)) {
   header('location:login.php');
}

/* This code is placing an order. */
if (isset($_POST['order_btn'])) {
   $number = $_POST['number'];
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, $_POST['street'] . ', ' . $_POST['city'] . ', ' . $_POST['country'] . ' - ' . $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if (mysqli_num_rows($cart_query) > 0) {
      while ($cart_item = mysqli_fetch_assoc($cart_query)) {
         $cart_products[] = $cart_item['name'] . ' (' . $cart_item['quantity'] . ') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ', $cart_products);

   $order_query = mysqli_query($conn,
    "SELECT * FROM `orders` WHERE name = '$user_name' AND number = '$number' AND email = '$user_email'
     AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if ($cart_total == 0) {
      $message[] = 'Your cart is empty';
   } else {
      if (mysqli_num_rows($order_query) > 0) {
         $message[] = 'Order placed already!';
      } else {
         mysqli_query($conn,
          "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on)
           VALUES('$user_id', '$user_name', '$number', '$user_email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')")
            or die('query failed');
         $message[] = 'Order placed successfully!';
         mysqli_query($conn,
          "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css" />
   <link rel="stylesheet" href="css/base.css" />
   <title>Bedtime || Checkout</title>

</head>

<body>

   <?php include 'components/navbar.php'; ?>

   <div class="heading">
      <h3>Checkout</h3>
      <p> <a href="cart.php">Cart</a> / Checkout </p>
   </div>

   <section class="display-order">

      <?php
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select_cart) > 0) {
         while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
      ?>
            <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$' . $fetch_cart['price'] . '/' . $fetch_cart['quantity']; ?>)</span> </p>
      <?php
         }
      } else {
         echo '<p class="empty-2">Thank you for buying!</p>';
      }
      ?>
      <div class="grand-total"> Grand total : <span>$<?php echo $grand_total; ?></span> </div>

   </section>

   <section class="checkout">

      <form action="" method="post">
         <h3>Place your order</h3>
         <div class="flex">
            <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users` where id = '$user_id' ") or die('query failed');
            if (mysqli_num_rows($select_users) > 0) {
               while ($fetch_users = mysqli_fetch_assoc($select_users)) {
            ?>
                  <div class="inputBox">
                     <span>Your name: </span>
                     <input type="text" name="name" value="<?php echo $fetch_users['name'] ?>" readonly>
                  </div>
                  <div class="inputBox">
                     <span>Your email: </span>
                     <input type="email" name="email" value="<?php echo $fetch_users['email'] ?>" readonly>
                  </div>
            <?php }
            } ?>
            <div class="inputBox">
               <span>Your number: </span>
               <input type="text" name="number" required placeholder="Enter your number">
            </div>
            <div class="inputBox">
               <span>Payment method: </span>
               <select name="method">
                  <option value="cash on delivery">Cash on delivery</option>
                  <option value="credit card">Credit card</option>
                  <option value="paypal">Paypal</option>
               </select>
            </div>
            <div class="inputBox">
               <span>Address line: </span>
               <input type="text" name="street" required placeholder="E.g: Washington Road">
            </div>
            <div class="inputBox">
               <span>City: </span>
               <input type="text" name="city" required placeholder="E.g: Washington, D.c">
            </div>
            <div class="inputBox">
               <span>State: </span>
               <input type="text" name="state" required placeholder="E.g: Alabama">
            </div>
            <div class="inputBox">
               <span>Country: </span>
               <input type="text" name="country" required placeholder="E.g: America">
            </div>
            <div class="inputBox">
               <span>Zip code: </span>
               <input type="text" min="0" name="pin_code" required placeholder="E.g: 123456">
            </div>
         </div>
         <div class="checkout-input">
            <input type="reset" value="Reset" class="btn" name="order_btn">
            <input type="submit" value="Order now" class="btn" name="order_btn">
         </div>
      </form>

   </section>


   <?php include 'components/footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/index.js"></script>

</body>

</html>