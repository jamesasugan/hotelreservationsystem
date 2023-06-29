<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link rel="stylesheet" href="CSS/exploretest.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="shortcut icon" href="pictures/logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/470d815d8e.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="header">
        <nav>
            <img src="pictures/HHH (WHITE).png" class="logo">
            <div class="header-nav">
            <ul id="sidemenu">
                <li><a href="exploretest.html" style="background-color: #D5B038;">ROOMS</a></li>
                <li><a href="home.php">Home</a></li>
                <li><a href="home.php#about">About us</a></li>
            </ul>
        </div>
        </nav>    
        <div class="container">
            <div class="title">
                <h3>Check out our Offers:</h3>
            </div>
            <div class="thumbnails">
                <div class="places" data-img="pictures/backgroundv2.jpg" data-aos="fade-right" data-aos-delay="400" data-aos-duration="700">
                    <img src="pictures/prem.jpg" width="250px" height="162px">
                    <div class="layer">
                        <h3>Premium Deluxe Room</h3>
                        <h5>18,000/Pernight</h5>
                        <p><span>Size:</span> 150ft</p>
                        <p><span>Capacity:</span> 3 Person</p>
                        <p><span>Bed:</span> California King-sized Bed</p>
                        <p class="last"><span>Amenities:</span> <i class="fa-solid fa-wifi"></i>&nbsp;&nbsp;<i class="fa-solid fa-tv"></i>&nbsp;&nbsp;<i class="fa-solid fa-bath"></i></i></p>
                        <a href="<?php if(isset($_SESSION['login_cust_id'])) echo 'book_form.php?room=1005'; else echo 'login.php'?>" onclick="updateSelectedOption('premium-deluxe')">Book Now</a>
                            
                    </div>
                </div>
                <div class="places" data-aos="fade-right" data-aos-delay="500" data-aos-duration="700" data-img="pictures/boracay.jpg">
                    <img src="pictures/del.jpg" width="250" height="162">
                    <div class="layer">
                        <div class="banner" style="background-image: url('boracay.jpg')"></div>
                        <h3>Deluxe Room</h3>
                        <h5>10,000/Pernight</h5>
                        <p><span>Size:</span> 95ft</p>
                        <p><span>Capacity:</span> 3 Person</p>
                        <p><span>Bed:</span> Queen-sized Bed</p>
                        <p class="last"><span>Amenities:</span> <i class="fa-solid fa-wifi"></i>&nbsp;&nbsp;<i class="fa-solid fa-tv"></i>&nbsp;&nbsp;<i class="fa-solid fa-bath"></i></i></p>
                        <a href="<?php if(isset($_SESSION['login_cust_id'])) echo 'book_form.php?room=1004'; else echo 'login.php'?>" onclick="updateSelectedOption('deluxe')">Book Now</a>
                    </div>
                </div>
                <div class="places" data-aos="fade-right" data-aos-delay="600" data-aos-duration="700">
                    <img src="pictures/fam.png" width="250" height="162">
                    <div class="layer">
                        <h3>Family Room</h3>
                        <h5>11,000/Pernight</h5>
                        <p><span>Size:</span> 120ft</p>
                        <p><span>Capacity:</span> 5 Person</p>
                        <p><span>Bed:</span> One Queen-sized bed, one Twin-sized Bed</p>
                        <p class="last"><span>Amenities:</span> <i class="fa-solid fa-wifi"></i>&nbsp;&nbsp;<i class="fa-solid fa-tv"></i>&nbsp;&nbsp;<i class="fa-solid fa-shower"></i></p>
                        <a href="<?php if(isset($_SESSION['login_cust_id'])) echo 'book_form.php?room=1003'; else echo 'login.php'?>" onclick="updateSelectedOption('family')">Book Now</a>
                    </div>
                </div>
                <div class="places" data-aos="fade-right" data-aos-delay="700" data-aos-duration="700">
                    <img src="pictures/exec.jpg" width="250" height="162">
                    <div class="layer">
                        <h3>Executive Suite</h3>
                        <h5>13,000/Pernight</h5>
                        <p><span>Size:</span> 100ft</p>
                        <p><span>Capacity:</span> 3 Person</p>
                        <p><span>Bed:</span> King-Sized Bed</p>
                        <p class="last"><span>Amenities:</span> <i class="fa-solid fa-wifi"></i>&nbsp;&nbsp;<i class="fa-solid fa-tv"></i>&nbsp;&nbsp;<i class="fa-solid fa-shower"></i></p>
                        <a href="<?php if(isset($_SESSION['login_cust_id'])) echo 'book_form.php?room=1002'; else echo 'login.php'?>" onclick="updateSelectedOption('executive')">Book Now</a>
                    </div>
                </div>
                <div class="places" data-aos="fade-right" data-aos-delay="800" data-aos-duration="700">
                    <img src="pictures/suite.jpg" width="250" height="500px">
                    <div class="layer">
                        <h3>Suite</h3>
                        <h5>8,500/Pernight</h5>
                        <p><span>Size:</span> 80ft</p>
                        <p><span>Capacity:</span> 2 Person</p>
                        <p><span>Bed:</span> Queen-Sized Bed</p>
                        <p class="last"><span>Amenities:</span> <i class="fa-solid fa-wifi"></i>&nbsp;&nbsp;<i class="fa-solid fa-shower"></i></p>
                        <a href="<?php if(isset($_SESSION['login_cust_id'])) echo 'book_form.php?room=1001'; else echo 'login.php'?>" onclick="updateSelectedOption('suite')">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<style></style>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</html>
