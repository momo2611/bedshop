<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

if (!isset($user_id)) {
  header('location:login.php');
}

if (isset($_POST['send'])) {
  $number = $_POST['number'];
  $msg = mysqli_real_escape_string($conn, $_POST['message']);

  $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE number = '$number' AND message = '$msg'") or die('Query failed');
  if (mysqli_num_rows($select_message) > 0) {
    $message[] = 'Message sent already!';
  } else {

    mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id','$user_name', '$user_email', '$number', '$msg') ") or die('Query failed');
    //mysqli_query($conn, "INSERT INTO `message`(name, email) SELECT name,email from `users` ") or die('Query failed');
    $message[] = 'Message sent successfully!';
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
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/base.css" />
  <title>DreamBed || Contact</title>
</head>

<body>
  <?php include 'components/navbar.php'; ?>
  <div class="heading">
    <h3>Contact form</h3>
    <p> <a href="home.php">Home</a> / Contact </p>
  </div>
  <!-- contact container -->
  <div class="contact-container">
    <div class="grid">
      <h1>Contact Us!</h1>
      <p>Fill out the form below to get in touch with one of our team members. We will try to get back to you within 48
        hours.
        If we do not reply within that time please feel free to use the form again.</p>
      <form method="post">
        <?php
        /* This is a PHP code that is used to fetch all the products from the database. */
        $select_users = mysqli_query($conn, "SELECT * FROM `users` where id = '$user_id' ") or die('query failed');
        if (mysqli_num_rows($select_users) > 0) {
          while ($fetch_users = mysqli_fetch_assoc($select_users)) {
        ?>
            <div class="form-group full">
              <label for="name">Full name*</label>
              <input type="text" name="name" id="name" class="form-element" value="<?php echo $fetch_users['name'] ?>" readonly />
            </div>
            <div class="form-group">
              <label for="email">Email address*</label>
              <input type="email" name="email" id="email" class="form-element" value="<?php echo $fetch_users['email'] ?>" readonly />
            </div>
        <?php }
        } ?>
        <div class="form-group">
          <label for="phone">Phone Number*</label>
          <input type="text" name="number" id="phone" required class="form-element" placeholder="0123456789" />
        </div>
        <div class="form-group full">
          <label for="message">What are you looking for?</label>
          <textarea name="message" id="message" class="form-element" placeholder="I want to ask you about something..."></textarea>
        </div>
        <div class="submit-group">
          <input type="submit" value="SEND MESSAGE" name="send" />
        </div>
      </form>
    </div>
  </div>
  <!-- end contact container -->

  <?php include 'components/footer.php'; ?>
  <script src="js/index.js"></script>
</body>

</html>