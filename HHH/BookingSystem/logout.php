<?php
session_start();
$_SESSION['login_cust_id'] = null;
$_SESSION['session_email'] = null;
header("Location: home.php");
exit();
