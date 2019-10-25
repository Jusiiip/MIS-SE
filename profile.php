<?php
include('session.php');

if(!isset($_SESSION['login_user'])){
header("location: index.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html>
    <form action="pay.php" method="POST">
        
<head>
<title>Student Dashboard</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome!:  <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
<br>
<b id="welcome">Student ID:  <i><?php echo $stud_ID; ?></i></b>
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
    <table><tr>
    <td>Ewallet Account Number:</td>
        <table><tr>
    <td><input type="text" name="ewallet_accountnumber" required></td>
      </tr></table>      
   </tr></table>
<br>
    <input name="pay_balance" type="submit" value="Pay Balance" 
    
    <?php 
         
    if ($user_balance == '0'){ ?> disabled <?php   } ?> />
</div>
</body>
    </form>
</html>