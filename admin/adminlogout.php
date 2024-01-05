<?php
session_start();
unset($_SESSION['Admin_ID']);
header("location:../adminlogin.php");

?>