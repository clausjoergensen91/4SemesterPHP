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
        $url = 'http://localhost:8033/Design_Time_Addresses/Service/BSIService/?wsdl';
        $params = array(
            'trace' => 1,
            'cache_wsdl' => 0,
            'soap_version' => SOAP_1_1
        );

        try {
            $client = new SoapClient($url, $params);
            $client->__setLocation("http://localhost:8033/Design_Time_Addresses/Service/BSIService");

            //var_dump($client->__getFunctions());
            $parameters = array('value' => 3);
            $result = $client->GetData($parameters);
            echo "Return values: {$result->GetDataResult} <br>";
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        ?>
    </body>
</html>
