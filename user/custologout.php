<?php
session_start();
unset($_SESSION['Customer_ID']);
header("location:../loginset.php");

?>