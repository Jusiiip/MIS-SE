<?php
session_start();
if(session_destroy()){ // Destroying All Sessions {
header("Location: aindex.php"); // Redirecting To Home Page
}
?>