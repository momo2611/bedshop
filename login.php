<?php

include 'config.php';
session_start();

/* It checks if the user has submitted the form. If the user has submitted the form, it will execute
the code inside the `if` statement. */
if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {

      $row = mysqli_fetch_assoc($select_users);

      if ($row['user_type'] == 'admin') {

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');
      } elseif ($row['user_type'] == 'user') {

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');
      }
   } else {
      $message[] = 'Incorrect email or password!';
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
   <title>Bedtime || Login</title>
</head>

<?php
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

<body class="body-form">
   <div class="center">
      <h1>Login</h1>
      <form method="post" class="login">
         <div class="txt_field">
            <input type="email" name="email" required>
            <span></span>
            <label>Email</label>
         </div>
         <div class="txt_field">
            <input type="password" name="password" required>
            <span></span>
            <label>Password</label>
         </div>
         <div class="pass">Forgot Password?</div>
         <input type="submit" name="submit" value="Login now">
         <div class="signup_link">
            Don't have an account? <a href="register.php">Sign up now!</a>
         </div>
      </form>
   </div>
</body>

</html>