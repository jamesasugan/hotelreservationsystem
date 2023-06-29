<?php
session_start();
$_SESSION['session_admin_id'] = null;
header("Location: adminlogin.php");
