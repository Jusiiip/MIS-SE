<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: index.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html>
    
<head>
<title>Student Dashboard</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome!:  <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
<br>
<br>
<b id="istp_completename">Complete Name:  <i><?php echo $user_surname; ?></i>
    <i><?php echo $user_firstname; ?></i> <i><?php echo $user_middlename; ?></i></b>    
<br>
<br>
<br>
<br>
<br>
<br>
<b id="istp_balance">Unpaid Balance:  <i><?php echo $user_balance; ?></i></b>
<br>
<br>
    <input name="pay_balance" type="submit" value="Pay Balance">
</div>
</body>
</html>