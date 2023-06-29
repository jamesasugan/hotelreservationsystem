
<?php
include 'functions.php';
if (isset($_POST['submit_crete_account'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_number  = $_POST['contact_number'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    if (!in_array($user_email, get_emails())){
        if(check_password($user_password)){
            $customer_id = insert_tbl_customer($first_name,$last_name,$contact_number);
            if (insert_cust_account($customer_id,$user_email,$user_password)){
                echo "<script>alert('Account Created');window.location.href='login.php'</script>";
                exit();
            }
        }
        echo "<script>alert('Invalid Password')</script>";
    }
    else{
        echo "<script>alert('Email already exist')</script>";
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
      <link rel="stylesheet" href="CSS/signup.css">
      <link rel="shortcut icon" href="pictures/logo.png" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet"/>
      <script src="https://kit.fontawesome.com/470d815d8e.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="CSS/signup.css">
</head>
<body>
    <div class="container">
      <a href="home.php">
        <img src="pictures/logo.png" class="logo">
      </a>
        <div class="form-box">
          <h2><span>H</span>appy <span>H</span>ours <span>H</span>otel</h2>
          <h1 id="title">Sign Up</h1>
          <form action="" method="post">
            <div class="input-group">
              <div class="input-field">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="First Name" name="first_name" required>
              </div>

              <div class="input-field">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Last Name" name="last_name" required>
              </div>

              <div class="input-field">
                <i class="fa-solid fa-phone"></i>
                <input type="tel" placeholder="Phone Number" name="contact_number" required>
              </div>

              <div class="input-field">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" placeholder="Email" name="user_email" required>
              </div>

              <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Password" name="user_password" required>
              </div>
            </div>
            <div class="button-field">
              <input type="submit" name="submit_crete_account" id="signin" value="Create Account">
            </div>
          </form>
        </div>
    </div>
</body>
</html>