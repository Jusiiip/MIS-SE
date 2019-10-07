<?php
include('asession.php');
if(!isset($_SESSION['login_admin'])){
header("location: aindex.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html>
<head>
<title>ISTP Admin Control Panel</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome!:  <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="alogout.php">Log Out</a></b>
    <br>
    <br>
    <a class="txt1 bo1 hov1" href="aregistration.html">
							Add Admin Account						
    </a>
</div>
</body>
</html>