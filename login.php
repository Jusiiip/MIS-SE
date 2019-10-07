<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['istp_username']) || empty($_POST['istp_password'])) {
$error = "Username or Password is invalid";
}
else{
// Define $username and $password
$username = $_POST['istp_username'];
$password = $_POST['istp_password'];
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "admin", "ewallet");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT istp_username, istp_password from istpaccount where istp_username=? AND istp_password=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_user'] = $username; // Initializing Session
header("location: profile.php"); // Redirecting To Profile Page
}
mysqli_close($conn); // Closing Connection
}
?>