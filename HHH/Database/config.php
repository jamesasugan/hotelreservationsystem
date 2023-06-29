<?php

$host = "localhost";
$username = "root";
$database = "db_booking_system";

$conn = mysqli_connect($host,$username,'',$database);

if (!$conn) {
    die("Connection failed: " .  mysqli_connect_error());
}
