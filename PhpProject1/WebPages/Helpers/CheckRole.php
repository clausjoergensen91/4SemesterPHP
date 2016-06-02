<?php

function Checkrole($targetURL, $role){
    
    session_start();
    $allowed = false;
    $what = '0';

    if(!isset($_SESSION['Username']))
    {
        header("Location: http://localhost:8000/WebPages/Login.php", true, 302);
        exit();
    }
    
    if(isset($_COOKIE['Roles']) && $_COOKIE['Roles'] == $role)
    {
        $allowed = true;
    }
    
    if(!isset($_COOKIE['Roles']))
    {
        $proxy = new SOAPConnect();
        $dbRole = $proxy->getRolesForUser($_SESSION['Username']);
        if($role == $dbRole)
        {
            $allowed = true;
        }
    }
    
    if(!$allowed)
    {
        header("Location: http://localhost:8000/WebPages/401.php");
        exit();
    }
}