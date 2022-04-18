<?php

include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {
      $message[] = 'User already exist!';
   } else {
      if ($pass != $cpass) {
         $message[] = 'Confirm password not matched!';
      } else {
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'Registered successfully!';
         header('location:login.php');
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
   <title>Bedtime || Register</title>
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
      <h1>Register</h1>
      <form method="post" class="login">
         <div class="txt_field">
            <input type="text" name="name" pattern=".{8,}" required>
            <span></span>
            <label>Username</label>
         </div>
         <div class="txt_field">
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required>
            <span></span>
            <label>Email</label>
         </div>
         <div class="txt_field">
            <input type="password" name="password" required>
            <span></span>
            <label>Password</label>
         </div>
         <div class="txt_field">
            <input type="password" name="cpassword" required>
            <span></span>
            <label>Confirm your password</label>
         </div>
         <div class="txt_field">
            <select name="user_type" class="box">
               <option value="user">User</option>
               <!-- <option value="admin">Admin</option> -->
            </select>
         </div>
         <input type="submit" name="submit" value="Register now">
         <div class="signup_link">
            Already have an account? <a href="login.php">Sign in now!</a>
         </div>
      </form>
   </div>
</body>

</html>