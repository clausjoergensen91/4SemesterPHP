<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        ini_set("soap.wsdl_cache_enabled", "0");
        $params = array("soap_version" => SOAP_1_2,
            "trace" => 1,
            "exceptions" => 0,
        );

        $client = new SoapClient('http://localhost:8733/Design_Time_Addresses/Service/Service1/?wsdl', $params);
        $actionHeader = new SoapHeader('http://www.w3.org/2005/08/addressing', 'Action', 'http://tempuri.org/IService1/GetData', true);

        $client->__setSoapHeaders($actionHeader);
        
        try {
            var_dump($client->__getFunctions());
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        
        $client->
        ?>
    </body>
</html>
