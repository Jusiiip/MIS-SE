<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['a_username']) || empty($_POST['a_password'])) {
$error = "Username or Password is invalid";
}
else{
// Define $username and $password
$a_username = $_POST['a_username'];
$a_password = $_POST['a_password'];
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "admin", "ewallet");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT a_username, a_password from istpadmin where a_username=? AND a_password=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $a_username, $a_password);
$stmt->execute();
$stmt->bind_result($a_username, $a_password);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_admin'] = $a_username; // Initializing Session
header("location: aprofile.php"); // Redirecting To Profile Page
}
mysqli_close($conn); // Closing Connection
}
?>