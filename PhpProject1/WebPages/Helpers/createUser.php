<?php

include_once '../ContentPages/SOAPConnect.php';
if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) &&
        isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['adminPrivilege'])) {
    $p = new SOAPConnect();
    $firstname = sanitizeInput($_POST['firstName']);
    $lastname = sanitizeInput($_POST['lastName']);
    $email = sanitizeInput($_POST['email']);
    $username = sanitizeInput($_POST['userName']);
    $password = sanitizeInput($_POST['password']);
    $admPri = sanitizeInput($_POST['adminPrivilege']);
    $type = 'User';
    if($p->createUser($username, $password, $firstname, $lastname, $email, $admPri, $type))
            echo 'Created';
    else
        echo 'User';
}
else
    echo 'Much';

function sanitizeInput($input) {
    $result = htmlspecialchars($input, ENT_QUOTES);
    $result = htmlentities($result);
    
    return $result;
}
