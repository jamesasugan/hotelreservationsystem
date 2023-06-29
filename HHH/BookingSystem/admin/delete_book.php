<?php
session_start();
include '../functions.php';


if(isset($_SESSION['session_admin_id']) and in_array($_GET['book_id'], getBooking_id())){
    include "../../Database/config.php";
    $book_id = $_GET['book_id'];
    $ref_id = $_GET['ref_id'];
    $delete_admin_book_record = "DELETE tbl_approve_books
        FROM tbl_approve_books
        JOIN tbl_bookings ON tbl_approve_books.book_id = tbl_bookings.book_id
        WHERE tbl_bookings.reference_id = '$ref_id'";
    $res = mysqli_query($conn, $delete_admin_book_record);
    if ($res){
        $delete_book_record = "DELETE FROM tbl_bookings WHERE book_id = $book_id";
        $res = mysqli_query($conn, $delete_book_record);
        if ($res){
            echo "<script>alert('Record deleted');window.location.href='index.php'</script>";
        }
    }
}
else{
    header("Location: index.php");
}

