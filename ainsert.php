<?php
include ('asession.php');
$urllogin ='aprofile.php';

$username = $_POST['a_username'];
$password = $_POST['a_password'];  

$istp_balance = 'istp_totbalance';

settype($istp_balance, "integer");

if (!empty($username) || !empty($password)){
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "admin";
    $dbname = "ewallet";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT a_username From istpadmin Where a_username = ? Limit 1";   
     $INSERT = "INSERT Into istpadmin (a_username, a_password) values(?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $stmt->bind_result($username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$urllogin.'">';
     } else {
      echo "This username is already registered. press back";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All fields are required.";
 die();
}
?>