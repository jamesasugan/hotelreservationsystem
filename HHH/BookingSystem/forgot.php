
<?php
include 'functions.php';

if (isset($_POST['submit'])){
    $forgot_pass_email = $_POST['forgotPass_email'];
    if (in_array($forgot_pass_email, get_emails())){
        $pass = getPass($forgot_pass_email);
        echo "<script>alert('Your Password: $pass');window.location.href='login.php'</script>";
    }
    else{
        echo "<script>alert('Email Dont exist');window.location.href='forgot.php'</script>";
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
      <link rel="stylesheet" href="CSS/forgot.css">
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
          <h1 id="title">Password Recovery</h1>
          <form method="post">
            <div class="input-group">
              <div class="input-field">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" placeholder="Email" name="forgotPass_email" required>
              </div>
            </div>
            <div class="button-field">
              <input type="submit" name="submit" id="recovery" value="Submit">
            </div>
          </form>
        </div>
    </div>

</body>
</html>