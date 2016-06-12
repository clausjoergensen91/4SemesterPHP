<?php
include_once '../../Model/News.php';
include_once '../ContentPages/SOAPSecureConnect.php';
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];

$date = $year . '-' . '0' . ($month+1) . '-' . $day . 'T' . '00:00:00'; 

session_start();
$username = $_SESSION['Username'];
$password = $_SESSION['Password'];
$proxy = new SOAPSecureConnect($username, $password);
$proxy->findUser("AdminUser");
