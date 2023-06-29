<?php
session_start();
include '../../Database/config.php';
include '../functions.php';
if (isset($_POST['save_edit'])){

    $admin_id = $_SESSION['session_admin_id'];
    $book_id = $_GET['book_id'];

    $edit_booker_name = $_POST['booker_name'];
    $edit_booker_email = $_POST['booker_email'];
    $edit_booker_number = $_POST['phone_number'];
    $edit_booker_room = $_POST['room'];
    $edit_date_check_in = $_POST['date_check_in'];
    $edit_time_check_in = $_POST['time_check_in'];
    $edit_date_check_out = $_POST['date_check_out'];
    $edit_time_check_out = $_POST['time_check_out'];
    $edit_book_status = $_POST['status'];

    $update_query = "UPDATE tbl_bookings SET
                        booker_name = '$edit_booker_name',
                        booker_email = '$edit_booker_email',
                        booker_phone_number = '$edit_booker_number',
                        room_id = '$edit_booker_room',
                        date_check_in = '$edit_date_check_in',
                        time_check_in = '$edit_time_check_in',
                        date_check_out = '$edit_date_check_out',
                        time_check_out = '$edit_time_check_out',
                        book_status = '$edit_book_status'
                        WHERE book_id = $book_id";
    if (mysqli_query($conn, $update_query)){
        if (get_book_status($book_id) == 'Booked'){
            $books_approve_query = "INSERT INTO tbl_approve_books (admin_account_id,book_id) values ($admin_id,$book_id)";
            $res = mysqli_query($conn,$books_approve_query);
            if ($res){
                echo "<script>alert('Book Approved');window.location.href='index.php'</script>";
                exit();
            }
            else{
                echo "Query failed: ".mysqli_error($conn);
                exit();
            }
        }
        echo "<script>alert('Data Updated');window.location.href='index.php'</script>";
    }
}


?>




<?php
if (isset($_SESSION['session_admin_id']) and isset($_GET['book_id']) and in_array($_GET['book_id'], getBooking_id())){

    $book_id = $_GET['book_id'];

    $query = "SELECT tbl_bookings.booker_name, tbl_bookings.booker_email, tbl_bookings.room_id, tbl_bookings.date_check_in, tbl_bookings.time_check_in, tbl_bookings.date_check_out, tbl_bookings.time_check_out, tbl_bookings.booker_phone_number, tbl_bookings.book_status, tbl_customers.cust_id
FROM tbl_bookings
JOIN tbl_rooms ON tbl_bookings.room_id = tbl_rooms.room_id
JOIN tbl_customers ON tbl_bookings.cust_id = tbl_customers.cust_id
WHERE tbl_bookings.book_id = $book_id";
    $result = mysqli_query($conn, $query);
    if ($result){
        $row = $result->fetch_assoc();
        $booker_name = $row['booker_name'];
        $booker_email = $row['booker_email'];
        $booker_phone_number = $row['booker_phone_number'];
        $book_status = $row['book_status'];
        $room_id = $row['room_id'];
        $date_check_in = $row['date_check_in'];
        $time_check_in = $row['time_check_in'];
        $date_check_out = $row['date_check_out'];
        $time_check_out = $row['time_check_out'];
        $cust_id = $row['cust_id'];
    }
}
else{
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="../pictures/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="body-overlay"></div>
    <div id="content">
        <div class="xp-breadcrumbbar text-center">
            <h3>Happy Hours Hotel</h3>
            <p>Reservation</p>
        </div>
    </div>
    <!------main-content-start----------->
    <div class="container">
        <div class="edit-form">
            <div class="row">
                <div class="col-sm-12 p-0">
                    <h5 class="modal-title">Edit Reservation</h5>
                    <form method="post">
                        <div class="form-group">
                            <label><strong>Name</strong></label>
                            <input name="booker_name" value="<?php echo $booker_name?>" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label><strong>Email</strong></label>
                            <input type="email" name="booker_email" value=" <?php echo $booker_email ?> " class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label><strong>Rooms</strong></label>
                            <br>
                            <select name="room" id="room" required>
                                <option value="1005"<?php if ($room_id == 1005) echo "selected"?> >Premium Deluxe Room</option>
                                <option value="1004"<?php if ($room_id == 1004) echo "selected"?> >Deluxe Room</option>
                                <option value="1003"<?php if ($room_id== 1003) echo "selected"?>  >Family Room</option>
                                <option value="1002"<?php if ($room_id == 1002) echo "selected"?> >Executive Suite</option>
                                <option value="1001"<?php if ($room_id == 1001) echo "selected"?> >Suite</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><strong>Check In-date</strong></label>
                            <input value="<?php echo $date_check_in?>" name="date_check_in" type="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label><strong>Check In-time</strong></label>
                            <input value="<?php echo $time_check_in?>"  name="time_check_in"  type="time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label><strong>Check Out-date</strong></label>
                            <input value="<?php echo $date_check_out?>"  name="date_check_out"  type="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label><strong>Check Out-time</strong></label>
                            <input value="<?php echo $time_check_out?>" name="time_check_out"  type="time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label><strong>Phone</strong></label>
                            <input value="<?php echo $booker_phone_number?>" name="phone_number" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label><strong>Status: </strong>&nbsp;</label>
                            <input type="radio" name="status" value="Booked" <?php if ($book_status == 'Booked') echo "checked"?>> Booked
                            <input type="radio" name="status" value="Pending"  <?php if ($book_status == 'Pending') echo "checked"?>> Pending
                        </div>
                        <a href="index.php" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <input type="submit" name="save_edit" value="Save" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
</body>
</html>
