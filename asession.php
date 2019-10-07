<?php
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "admin", "ewallet");
session_start();// Starting Session
// Storing Session
$admin_check = $_SESSION['login_admin'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT a_username from istpadmin where a_username = '$admin_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['a_username'];
?>