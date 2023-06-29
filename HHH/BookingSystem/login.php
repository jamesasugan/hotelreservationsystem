<?php
session_start();
include 'functions.php';
if (isset($_POST['sign-in'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    if (in_array($email,get_emails())){
        if (getPass($email) == $pass){
            $_SESSION['login_cust_id'] = get_cust_id($email);
            $_SESSION['session_email']= $email;
            header("Location: home.php");
        }
        else{
            echo "<script>alert('Incorrect Password')</script>";
        }
    }
    else{
        echo "<script>alert('Email dont exist')</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Happy Hours Hotel</title>
      <link rel="stylesheet" href="CSS/login.css">
      <link rel="shortcut icon" href="pictures/logo.png" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet"/>
      <script src="https://kit.fontawesome.com/470d815d8e.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
      <a href="home.php">
        <img src="pictures/logo.png" class="logo">
      </a>
        <div class="form-box">
          <h2><span>H</span>appy <span>H</span>ours <span>H</span>otel</h2>
          <h1 id="title">Sign In</h1>
          <form method="post">
            <div class="input-group">
              <div class="input-field">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" placeholder="Email" name="email">
              </div>
              <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Password" name="password">
              </div>
              <a href="forgot.php">Forgot Password?</a>
            </div>
            <div class="button-field">
              <input type="submit" name="sign-in" id="signin" value="Sign in">
            </div>
          </form>
            <a href="signup.php" class="signup-btn">
                <button type="button" id="signup">Sign up</button>
            </a>
        </div>
    </div>
</body>
</html>