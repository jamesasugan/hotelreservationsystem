<?php
session_start();
include '../Database/config.php';

if (isset($_SESSION['login_cust_id']) and isset($_POST['book_reservation'])){
    $cust_id = $_SESSION['login_cust_id'];
    $booker_name = $_POST['booker_name'];
    $booker_number = $_POST['booker_number'];
    $booker_email = $_POST['booker_email'];
    $reserve_room = $_POST['room'];
    $check_in_date = $_POST['check-in-date'];
    $check_in_time = $_POST['check-in-time'];
    $check_out_date = $_POST['check-out-date'];
    $check_out_time = $_POST['check-out-time'];
    $reference_id = "Ref:$cust_id".uniqid();

    $query = "INSERT INTO tbl_bookings (cust_id, room_id, booker_name, booker_phone_number, booker_email, date_check_in,
                          time_check_in, date_check_out, time_check_out, reference_id) 
VALUES ($cust_id, $reserve_room, '$booker_name', '$booker_number', '$booker_email', '$check_in_date', 
        '$check_in_time', '$check_out_date', '$check_out_time', '$reference_id')";


    $result = mysqli_query($conn, $query);
    if ($result){
        echo "<script>alert('Reference Id : $reference_id');window.location.href='userprofile.php'</script>";
        exit();
    } else {
        die("Query failed: " . mysqli_error($conn));
    }
} else {
    header('Location: home.php');
    exit();
}
?>


