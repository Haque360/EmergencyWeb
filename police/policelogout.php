<?php
session_start();
unset($_SESSION['PS_ID']);
header("location: ../policelogin.php");
?>