<?php

include_once '../ContentPages/SOAPConnect.php';
include_once '../ContentPages/SOAPSecureConnect.php';
include_once '../../Model/User.php';


$proxy = new SOAPConnect();
//$actionHeader = new SoapHeader('http://www.w3.org/2005/08/addressing','Action','https://Asus:8182/WebHost/BSIService.svc',true);
//$proxy->client->__setSoapHeaders(array($actionHeader));

$username = $_POST['username'];
$password = $_POST['password'];

if($proxy->validateUser($username, $password))
{
    session_start();
    $rollenummer = $proxy->getRolesForUser($username);
    $_SESSION['Username'] = $username;
    $_SESSION['Password'] = $password; 
    setcookie('Roles', $rollenummer, 0, '/WebPages/',"localhost", false, true);
    
//   $soapClient = new SOAPConnect();
    //$soapClient->setCredentials($username, $password);
    

    //Check with your provider which security name-space they are using. 
//    $strWSSENS = "http://schemas.xmlsoap.org/ws/2002/07/secext"; 
//
//    $objSoapVarUser = new SoapVar($username, XSD_STRING, NULL, $strWSSENS, NULL, $strWSSENS); 
//    $objSoapVarPass = new SoapVar($password, XSD_STRING, NULL, $strWSSENS, NULL, $strWSSENS); 
//    
//    $objWSSEAuth = new clsWSSEAuth($objSoapVarUser, $objSoapVarPass); 
//
//    $objSoapVarWSSEAuth = new SoapVar($objWSSEAuth, SOAP_ENC_OBJECT, NULL, $strWSSENS, 'UsernameToken', $strWSSENS); 
// 
//    $objWSSEToken = new clsWSSEToken($objSoapVarWSSEAuth); 
//
//    $objSoapVarWSSEToken = new SoapVar($objWSSEToken, SOAP_ENC_OBJECT, NULL, $strWSSENS, 'UsernameToken', $strWSSENS); 
//
//    $objSoapVarHeaderVal=new SoapVar($objSoapVarWSSEToken, SOAP_ENC_OBJECT, NULL, $strWSSENS, 'Security', $strWSSENS); 
//
//    $objSoapVarWSSEHeader = new SoapHeader($strWSSENS, 'Security', $objSoapVarHeaderVal,true, 'http://abce.com'); 
// 
//    $soapClient->client->__setSoapHeaders(array($objSoapVarWSSEHeader)); 
//
//    $soapClient->findPlayer("peter@bsi"); 

    
    
    $urlPath = "Location: http://localhost:8000";
    header($urlPath);


    exit();
}

?>

