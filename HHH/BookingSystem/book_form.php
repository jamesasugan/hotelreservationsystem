<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="CSS/book.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet"/>
    <link rel="shortcut icon" href="pictures/logo.png" type="image/x-icon">
</head>
<body>
<a href="home.php">
    <img src="pictures/logo.png" class="logo">
</a>
<div class="form">
    <div class="form-text">
        <h2><span>H</span>appy <span>H</span>ours <span>H</span>otel</h2>
        <h1>Book Now</h1>
        <div class="popup" id="popup">
            <div class="popup-content">
                <h2>Thank you</h2>
                <p>A confirmation email will be sent to you.</p>
                <p>Please check your reservation history.</p>
                <button onclick="closePopup()">Close</button>
            </div>
        </div>
    </div>
    <div class="main-form">
        <form action="booking_process.php" method="post">
            <div class="input-field">
                <p>Name:</p>
                <input type="text" name="booker_name" id="name" required placeholder="Write your name here...">
            </div>
            <div >
                <p>Email Address:</p>
                <input type="email" name="booker_email" id="email" required placeholder="Write your email address here...">
            </div>
            <div class="input-field">
                <p>Phone number:</p>
                <input type="tel" name="booker_number" id="number" placeholder="Write your phone number here..." required>
            </div>
            <div class="input-field">
                <p>Type of Room:</p>
                <select name="room" id="room" required>
                    <option value="1005"<?php if ($_GET['room'] == 1005) echo "selected"?> >Premium Deluxe Room</option>
                    <option value="1004"<?php if ($_GET['room'] == 1004) echo "selected"?> >Deluxe Room</option>
                    <option value="1003"<?php if ($_GET['room'] == 1003) echo "selected"?>  >Family Room</option>
                    <option value="1002"<?php if ($_GET['room'] == 1002) echo "selected"?> >Executive Suite</option>
                    <option value="1001"<?php if ($_GET['room'] == 1001) echo "selected"?> >Suite</option>
                </select>
            </div>
            <div class="input-field">
                <p>Check-In Date and Time:</p>
                <input type="date" name="check-in-date" id="check-in-date" required>
                <input type="time" name="check-in-time" id="check-in-time" required>
            </div>
            <div class="input-field">
                <p>Check-Out Date and Time:</p>
                <input type="date" name="check-out-date" id="check-out-date" required>
                <input type="time" name="check-out-time" id="check-out-time" required>
            </div>
            <div id="submit">
                <input type="submit" value="SUBMIT" name="book_reservation" id="submit" required>
            </div>
        </form>
    </div>
</div>
<script>

    /*
    function getURLParam(parameter) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(parameter);
    }

    const selectedRoom = getURLParam('room');
    if (selectedRoom) {
        const select = document.getElementById('room');
        select.value = selectedRoom;
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }


    //pop up confirmation

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
        window.location.href = 'userprofile.html#reservation';
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('submit').addEventListener('click', function(event) {
            event.preventDefault();

            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var number = document.getElementById('number').value;
            var room = document.getElementById('room').value;
            var checkInDate = document.getElementById('check-in-date').value;
            var checkInTime = document.getElementById('check-in-time').value;
            var checkOutDate = document.getElementById('check-out-date').value;
            var checkOutTime = document.getElementById('check-out-time').value;

            if (name && email && number && room && checkInDate && checkInTime && checkOutDate && checkOutTime) {
                // All required fields are filled, proceed with form submission

                // Display a confirmation message
                var confirmationMessage = 'Please confirm that all the details are correct:'

                var isConfirmed = confirm(confirmationMessage);

                if (isConfirmed) {
                    // Handle form submission or perform any other necessary action here

                    // Display the popup
                    document.getElementById('popup').style.display = 'flex';
                } else {
                    // User canceled the confirmation, do nothing
                }
            } else {
                // Show error message or handle incomplete form
                alert('Please fill in all the required fields.');
            }
        });
    });
*/
</script>
</body>
</html>