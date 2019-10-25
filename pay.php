<?php
include('session.php');



$urlgoback = 'profile.php';

$zero_ = 0;
$a = 1000;
$istp_totbalance = 'istp_totbalance';

settype($istp_totbalance, "integer");
settype($user_balance, "integer");
settype($new_balance, "integer");
$new_balance = ($istp_totbalance + $user_balance);



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




$sql1 = "UPDATE istpadmin SET istp_totbalance = istp_totbalance + $user_balance WHERE A_ID = A_ID";



if (mysqli_query($conn, $sql1)) {
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$urlgoback.'">';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "UPDATE istpaccount SET istp_balance = istp_balance - istp_balance WHERE istp_studentiD = $stud_ID";

if (mysqli_query($conn, $sql)) {
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$urlgoback.'">';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>

