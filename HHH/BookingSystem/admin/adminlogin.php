<?php
session_start();
function get_admin_accounts() {
    include '../../Database/config.php';
    $query = "SELECT * FROM tbl_admin_accounts";
    $res = mysqli_query($conn, $query);
    $admin_accounts_info = array();

    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $account_info = array(
                $row['admin_account_id'],
                $row['admin_email'],
                $row['admin_password']
            );
            $admin_accounts_info[] = $account_info;
        }
    }

    return $admin_accounts_info;
}

if (isset($_POST['admin_login'])){
    $admin_login_email = $_POST['admin_email'];
    $admin_login_password = $_POST['admin_password'];
    foreach (get_admin_accounts() as $admin_info){
        if ($admin_login_email == $admin_info[1]){
            if ($admin_login_password==$admin_info[2]){
                $_SESSION['session_admin_id'] = $admin_info[0];
                header("Location: index.php");
            }
        }
    }
    echo "<script>alert('Invalid email or pass');window.location.href='adminlogin.php'</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="css/adminlogin.css">
    <link rel="shortcut icon" href="../pictures/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/470d815d8e.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <img src="../pictures/logo.png" class="logo">
    <div class="form-box">
        <h2><span>H</span>appy <span>H</span>ours <span>H</span>otel</h2>
        <h1 id="title">admin</h1>
        <form method="post">
            <div class="input-group">

                <div class="input-field">
                    <i class="fa-solid fa-envelope"></i>
                    <input name="admin_email" type="email" placeholder="Email" required>
                </div>

                <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input name="admin_password" type="password" placeholder="Password" required>
                </div>
            </div>
            <div class="button-field">
                <input class="signin-btn" type="submit" id="signin" name="admin_login" value="Login">
            </div>
        </form>
    </div>
</div>

</body>
</html>