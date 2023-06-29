<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project X</title>
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet"/>
    <link rel="shortcut icon" href="pictures/logo.png" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/470d815d8e.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="header">
    <div class="container">
        <nav>
            <img src="pictures/logo.png" class="logo">
            <div class="header-nav">
            <ul id="sidemenu">
                <li><a href="exploretest.php">ROOMS</a></li>
                <li><a href="events.html">EVENTS</a></li>
                <li><a href="#about">ABOUT US</a></li>
                <?php if(!isset($_SESSION['login_cust_id'])) echo "<li class='sign_in'><a href='login.php'>Log In</a></li>"; ?>
                <i class="fas fa-times" onclick="closemenu()"></i>
                <?php if(isset($_SESSION['login_cust_id'])) echo "<li id='userinfo'><a href='userprofile.php'><i class='fa-solid fa-user'></i></a></i></li>";?>
            </ul>
        </div>
            <i class="fas fa-bars" onclick="openmenu()" id="hamburger-icon"></i>
            <div class="header-text">
                <p class="first-line" ><span>H</span>appy <span>H</span>ours <span>H</span>otel</p>
                    <p class="second">Experience your happiest hours in our Hotel</p>
            </div>
        </nav>
        </div>
    </div>
<div id="about">
  <div class="container">
    <img class="logo_about" src="pictures/logo.png">
    <h1 class="about_us">About Us</h1>
    <p class="description2">Welcome to Happy Hours Hotel, a hotel of elegance and<span> luxury located at city of Biñan.   As a five-star luxury hotel,</span> <span> span we provide guests with an unforgettable experience, </span> <span> fast accommodations, and top-class amenities. </span>
    </p>
    <p class="description">At Happy Hours Hotel, we believe in creating a space where excitement and relaxation is present. Our luxurious bedrooms and suites can offer you the combination of sophistication and elegance. Each room provides the utmost comfort and privacy, ensuring a comfortable stay. 

        Experience the essence of luxury as our dedicated team is committed to exceeding your expectations, ensuring that every moment of your stay in Happy Hours Hotel is unforgettable
    </p>
    <div class="social-icons">
        <h4>Connect with Us:</h4>
        <a href="https://www.facebook.com/jhnewrd/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://www.facebook.com/jhnewrd/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.facebook.com/jhnewrd/" target="_blank"><i class="fa-solid fa-envelope"></i></a>
    </div>
  </div>
</div>

<script>

    var sidemeu = document.getElementById("sidemenu");
    var hamburgerIcon = document.getElementById("hamburger-icon");

    function openmenu(){
        sidemeu.style.top = "0";
        hamburgerIcon.style.display = "none";
    }
    function closemenu(){
        sidemeu.style.top = "-100vh";
        hamburgerIcon.style.display = "inline-block";
    }

</script>

</body>
<style></style>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</html>