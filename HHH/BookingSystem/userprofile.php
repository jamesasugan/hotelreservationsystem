<?php
session_start();
include '../Database/config.php';
include 'functions.php';
$cust_id = $_SESSION['login_cust_id'];
if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact_number = $_POST['contactNum'];
    $user_email = $_POST['user_email'];
    $update_tbl_cust = "UPDATE tbl_customers SET first_name='$fname', last_name='$lname', contact_number='$contact_number'
WHERE cust_id= $cust_id";
    $result = mysqli_query($conn, $update_tbl_cust);
    if ($result){
        if (!in_array($user_email,get_emails())) {
            $update_email = "UPDATE tbl_cust_accounts SET user_email = '$user_email' WHERE cust_id= $cust_id";
            $result = mysqli_query($conn, $update_email);
            if($result){
                $_SESSION['session_email'] = $user_email;
                echo "<script>alert('All Info Updated');window.location.href='userprofile.php'</script>";
                exit();
            }
        }
        else{
            echo "<script>alert('Info Updated');window.location.href='userprofile.php'</script>";
            exit();
        }
    }
}
?>
<?php
if (isset($_POST['change_pass'])){
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];
    if (getPass($_SESSION['session_email']) == $old_pass){
        if ($new_pass == $confirm_pass){
            $change_pass ="UPDATE tbl_cust_accounts SET cust_password = '$confirm_pass' where cust_id = $cust_id" ;
            $result = mysqli_query($conn,$change_pass);
            if ($result){

                echo "<script>alert('Password Change');window.location.href='userprofile.php'</script>";
            }
            else{
                echo "Query Failed: ".mysqli_error($conn);
            }
        }else{
            echo "<script>alert('New pass not match');window.location.href='userprofile.php'</script>";

        }
    }
    else{
        echo "<script>alert('Old pass not match');window.location.href='userprofile.php'</script>";
    }
}
?>

<?php
if (isset($_SESSION['login_cust_id'])){
    $cust_info = get_cust_info($_SESSION['login_cust_id']);
}else{
    header('Location: home.php');
}


?>


<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Account Settings</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/userprofile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet"/>
    <link rel="shortcut icon" href="pictures/logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/470d815d8e.js" crossorigin="anonymous"></script>
</head>
<body>
	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Account Settings</h1>
            <a href="home.php" class="logo"><img src="pictures/logo.png"></a>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<h4 class="text-center" id="user_name"><?php echo $cust_info['fname']." ".$cust_info['lname']?></h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
						<a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
							<i class="fa-solid fa-book"></i>
							Reservation
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Account Settings</h3>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="fname" class="form-control" value="<?php echo $cust_info['fname']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" class="form-control" value="<?php echo $cust_info['lname']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="user_email" class="form-control" value="<?php echo $cust_info['email']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input type="text" class="form-control" name="contactNum" value="<?php echo $cust_info['contact_number']?>">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="update" class="btn btn-primary" value="Update">
                            <a href="home.php" class="btn btn-light">Cancel</a>
                            <a href="logout.php" class="btn btn-danger">Logout</a>
                        </form>

					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Password Settings</h3>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old password</label>
                                        <input name="old_pass" type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New password</label>
                                        <input name="new_pass" type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm new password</label>
                                        <input name="confirm_pass" type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary" name="change_pass" value="Update">
                                <a href="userprofile.php" class="btn btn-light">Cancel</a>
                            </div>
                        </form>

					</div>
					<div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
						<h3 class="mb-4">Reservation</h3>
						<div class="management-module">
                            <div class="reservation-info">
                              <table>
                                  <thead>
                                  <tr>
                                      <th>Name of Room</th>
                                      <th>Check In-date</th>
                                      <th>Check In-time</th>
                                      <th>Check Out-date</th>
                                      <th>Check Out-time</th>
                                      <th>Status</th>
                                      <th>Reference</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  $query = "SELECT tbl_rooms.room_type, tbl_bookings.date_check_in,tbl_bookings.time_check_in,
                                  tbl_bookings.date_check_out,tbl_bookings.time_check_out, tbl_bookings.book_status,
                                  tbl_bookings.reference_id FROM tbl_bookings
                                  JOIN tbl_rooms on tbl_rooms.room_id =tbl_bookings.room_id
                                  JOIN tbl_customers on tbl_customers.cust_id = tbl_bookings.cust_id
                                  where tbl_bookings.cust_id = $cust_id";
                                  $result = mysqli_query($conn, $query);
                                  if ($result){
                                      while ($row = $result->fetch_assoc()){
                                          echo "<tr>";
                                          echo "<td>".$row['room_type']."</td>";
                                          echo "<td>".$row['date_check_in']."</td>";
                                          echo "<td>".$row['time_check_in']."</td>";
                                          echo "<td>".$row['date_check_out']."</td>";
                                          echo "<td>".$row['time_check_out']."</td>";
                                          echo "<td>".$row['book_status']."</td>";
                                          echo "<td>".$row['reference_id']."</td>";
                                          echo "</tr>";
                                      }
                                  }else{
                                      die("Query failed: " . mysqli_error($conn));
                                  }
                                  ?>
                                  </tbody>
                              </table>
                            </div>
                            <div>
                                <p>Cancel Reservation? Email us <a href="#">happyhourshotel@gmail.com</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>