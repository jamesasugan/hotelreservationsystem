<?php
function get_emails(){
    include '../Database/config.php';
    $queryEmail = "SELECT user_email FROM tbl_cust_accounts";
    $result = mysqli_query($conn, $queryEmail);
    $array_emails = array();
    while ($row = $result->fetch_assoc()){
        $array_emails[] = $row['user_email'];
    }
    return $array_emails;
}

function check_password($password){
    $pattern = "/^[^*&%^]+$/";
    if (preg_match($pattern, $password)){
        if (strlen($password)>3){
            return true;
        }
    }
    return false;
}
function insert_tbl_customer($first_name,$last_name, $contact_number){
    include '../Database/config.php';
    $query = "INSERT INTO tbl_customers SET first_name= '$first_name', last_name='$last_name', contact_number='$contact_number' ";
    $res = mysqli_query($conn,$query);
    if ($res){
        return mysqli_insert_id($conn);
    }
    else{
        die("Query failed: " . mysqli_error($conn));
    }
}
function insert_cust_account($cust_id,$user_email, $user_password){
    include '../Database/config.php';
    $query = "INSERT INTO tbl_cust_accounts SET cust_id= $cust_id, user_email ='$user_email'
                                  , cust_password= '$user_password'";
    if (mysqli_query($conn , $query)){
        return true;
    }
    die("Query failed: " . mysqli_error($conn));
}
function getPass($email){
    include '../Database/config.php';
    $query = "SELECT cust_password from  tbl_cust_accounts where user_email = '$email'";
    $res = mysqli_query($conn, $query);
    if($res){
        while($row = $res->fetch_assoc()){
            return $row['cust_password'];
        }

    }
    die("Query failed: " . mysqli_error($conn));
}
function get_cust_id($email){
    include "../Database/config.php";
    $query = "SELECT tbl_customers.cust_id 
          FROM tbl_customers 
          JOIN tbl_cust_accounts ON tbl_cust_accounts.cust_id = tbl_customers.cust_id 
          WHERE tbl_cust_accounts.user_email = '$email'";

    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();
    return $row['cust_id'];
}
function get_cust_info($cust_id){
    include '../Database/config.php';
    $query = "SELECT tbl_cust_accounts.user_email,tbl_customers.first_name, tbl_customers.last_name,
    tbl_customers.contact_number FROM tbl_customers
    JOIN tbl_cust_accounts on tbl_cust_accounts.cust_id = tbl_customers.cust_id where tbl_customers.cust_id = $cust_id";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();
    $cust_info = array(
        'email' => $row['user_email'],
        'fname' => $row['first_name'],
        'lname' => $row['last_name'],
        'contact_number' => $row['contact_number']
    );
    return $cust_info;
}
function getBooking_id(){
    include '../../Database/config.php';
    $query = "SELECT book_id from tbl_bookings";
    $res = mysqli_query($conn, $query);
    $id_list = array();
    if ($res){
        while ($row = $res->fetch_assoc()){
            $id_list[] = $row['book_id'];
        }
        return $id_list;
    }
    return false;
}

function get_book_status($book_id){
    include '../../Database/config.php';
    $getstatusquery = "SELECT book_status FROM tbl_bookings WHERE book_id = $book_id";
    $res = mysqli_query($conn, $getstatusquery);
    if ($res){
        $row = $res->fetch_assoc();
        return $row['book_status'];
    }
    die("Query failed: " . mysqli_error($conn));
}



?>
