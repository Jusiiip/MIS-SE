<?php
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "admin", "ewallet");
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT istp_username, istp_balance, istp_firstname, istp_middlename, istp_surname, istp_studentiD from istpaccount where istp_username = '$user_check'";

$query2 = "SELECT E_ID from ewallet where E_ID = 'ewallet_accountnumber'";

$ses_sql2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_assoc($ses_sql2);



$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);


$login_session = $row['istp_username'];
$user_balance = $row['istp_balance'];
$user_firstname = $row['istp_firstname'];
$user_middlename = $row['istp_middlename'];
$user_surname = $row['istp_surname'];
$stud_ID = $row['istp_studentiD'];  
?>