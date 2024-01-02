<?php session_start();
$id_kon = $_SESSION['id_kon'];
if(!isset($_SESSION['cust'])) {
    header("location: ../loginauth.php");
} ?>