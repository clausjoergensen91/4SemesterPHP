<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        foreach (glob("Model/*.php") as $filename) {
            include_once $filename;
        }
        
        
        $classmap = array('User' => 'User',
            'Player' => 'Player',
            'Team' => 'Team',
            'TrainingSession' => 'TrainingSession',
            'News' => 'News',
            'Match' => 'Match',
            'Events' => 'Events',
            'ContentInfo' => 'ContentInfo');
        
        $url = 'http://localhost:8033/Design_Time_Addresses/Service/BSIService/?wsdl';
        $params = array(
            'trace' => 1,
            'cache_wsdl' => 0,
            'soap_version' => SOAP_1_1,
            'classmap' => $classmap
        );

        try {
            $client = new SoapClient($url, $params);
            $client->__setLocation("http://localhost:8039/Design_Time_Addresses/Service/BSIService");

            //var_dump($client->__getFunctions());
            $parameters = array('name' => "TeamForTestingFind",
                'retrieveAssoc' => true);
            $result = $client->FindTeam($parameters);
            echo '<h2>Results</h2><pre>';
            print_r($result);
            echo '</pre>';
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        ?>
    </body>
</html>
