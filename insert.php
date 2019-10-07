<?php
$urllogin ='index.php';
$username = $_POST['istp_username'];
$password = $_POST['istp_password'];
$firstname = $_POST['istp_firstname'];
$middlename = $_POST['istp_middlename'];
$surname = $_POST['istp_surname'];
$program = $_POST['istp_program'];
$studentID = $_POST['istp_studentiD'];
$email = $_POST['istp_email'];
$contactno = $_POST['istp_contactno'];
$gender = $_POST['istp_gender'];
$secretquestion = $_POST['istp_secretquestion'];
$secretquestionanswer = $_POST['istp_SQanswer'];
    

if (!empty($username) || !empty($password) || !empty($firstname) || !empty($middlename) || !empty($surname) || !empty($program) || !empty($studentID) || !empty($email) || !empty($contactno) || !empty($gender) || !empty($secretquestion) || !empty($secretquestionanswer)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "admin";
    $dbname = "ewallet";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT istp_email From istpaccount Where istp_email = ? Limit 1";
     $INSERT = "INSERT Into istpaccount (istp_username, istp_password, istp_firstname, istp_middlename, istp_surname, istp_program, istp_studentiD, istp_email, istp_contactno, istp_gender, istp_secretquestion, istp_SQanswer) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssssssisis", $username, $password, $firstname, $middlename, $surname, $program, $studentID, $email, $contactno, $gender, $secretquestion, $secretquestionanswer);
      $stmt->execute();
      echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$urllogin.'">';
     } else {
      echo "This email is already registered.";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All fields are required.";
 die();
}
?>