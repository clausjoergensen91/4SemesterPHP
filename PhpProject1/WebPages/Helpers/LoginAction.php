<?php

include_once '../ContentPages/SOAPConnect.php';
include_once '../ContentPages/SOAPSecureConnect.php';
include_once '../../Model/User.php';
$proxy = new SOAPConnect();

$username = $_POST['username'];
$password = $_POST['password'];

if($proxy->validateUser($username, $password))
{
    session_start();
    $rollenummer = $proxy->getRolesForUser($username);
    $_SESSION['Username'] = $username;
    $_SESSION['Password'] = $password; 
    setcookie('Roles', $rollenummer, 0, '/WebPages/',"localhost", false, true);
    
    $urlPath = "Location: http://localhost:8000";
    header($urlPath);
    
    exit();
}

?>
}
