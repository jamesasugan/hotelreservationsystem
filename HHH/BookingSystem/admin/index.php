<?php
session_start();
include '../../Database/config.php';
if (!isset($_SESSION['session_admin_id'])){
    header("Location: adminlogin.php");
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
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">

</head>
<body>
<div class="wrapper">
	<div class="body-overlay"></div>

	<div id="content">
		<div class="xp-breadcrumbbar text-center">
			<h3>Happy Hours Hotel</h3>
			<p>Dashboard</p>	
			<a href="admin_logout.php">Log out</a>		
		</div>
	</div>
</div>
<!------main-content-start----------->
<div class="main-content">
	<div class="row">
		<div class="col-md-12">
			<div class="table-wrapper">

				<div class="table-title">
					<div class="row">
						<div class="col-sm-12 col-md-6 p-0">
							<h2 class="ml-lg-2">Reservations</h2>
						</div>
						<div class="col-sm-12 col-md-6 p-0 d-flex justify-content-end align-items-center">
							<div class="search">
                                <form method="post">
                                    <input name="search" id="search-input" placeholder="Search Record">
                                    <button name="submit_search">Search</button>
                                </form>
							</div>
						</div>
					</div>
				</div>

				<table class="table table-striped table-hover">
					<thead>
					<tr>
						<th><strong>Name</strong> </th>
						<th><strong>Email</strong></th>
						<th><strong>Phone</th>
                        <th><strong>Room type</strong></th>
						<th><strong>Status</strong></th>
						<th><strong>Actions</strong></th>
					</tr>
					</thead>

					<tbody>
                    <?php
                    if (isset($_POST['submit_search'])){
                        $search = $_POST['search'];
                        $query = "SELECT tbl_bookings.book_id, tbl_bookings.booker_name, tbl_bookings.booker_email, tbl_bookings.booker_phone_number, 
       tbl_rooms.room_type, tbl_bookings.book_status, tbl_bookings.cust_id FROM tbl_bookings 
           JOIN tbl_rooms ON tbl_bookings.room_id = tbl_rooms.room_id
           where tbl_bookings.booker_name LIKE '%$search%' or
            tbl_bookings.booker_email LIKE '%$search%' or
            tbl_bookings.booker_phone_number LIKE '%$search%' or
            tbl_rooms.room_type  LIKE '%$search%' or
            tbl_bookings.book_status LIKE '%$search%'
ORDER BY tbl_bookings.book_status
            ";
                        $res = mysqli_query($conn, $query);
                        if ($res){
                            while ($row = $res->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>".$row['booker_name']."</td>";
                                echo "<td>".$row['booker_email']."</td>";
                                echo "<td>".$row['booker_phone_number']."</td>";
                                echo "<td>".$row['room_type']."</td>";
                                echo "<td>".$row['book_status']."</td>";
                                echo "<th>
							<a href='' class='edit'>
								<i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i>
							</a>
							<a href='delete_book.php?book_id=".$row['book_id']."' class='delete'>
								<i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i>
							</a>
						</th>";
                                echo "</tr>";

                            }
                        }
                    }
                    else{
                        $query = "SELECT tbl_bookings.book_id, tbl_bookings.booker_name, tbl_bookings.booker_email, tbl_bookings.booker_phone_number, 
       tbl_rooms.room_type, tbl_bookings.book_status, tbl_bookings.cust_id, tbl_bookings.reference_id FROM tbl_bookings 
           JOIN tbl_rooms ON tbl_bookings.room_id = tbl_rooms.room_id ORDER BY tbl_bookings.book_status";
                        $res = mysqli_query($conn, $query);
                        if ($res){
                            while ($row = $res->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>".$row['booker_name']."</td>";
                                echo "<td>".$row['booker_email']."</td>";
                                echo "<td>".$row['booker_phone_number']."</td>";
                                echo "<td>".$row['room_type']."</td>";
                                echo "<td>".$row['book_status']."</td>";
                                echo "<th>
							<a href='EditBooking.php?book_id=".$row['book_id']."&ref_id=".$row['reference_id']."' class='edit'>
								<i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i>
							</a>
							<a href='delete_book.php?book_id=".$row['book_id']."&ref_id=".$row['reference_id']."' class='edit'>
								<i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i>
							</a>
						</th>";
                                echo "</tr>";
                            }
                        }
                    }

                    ?>
					</tbody>
				</table>
			</div>
		</div>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
</body>
</html>


