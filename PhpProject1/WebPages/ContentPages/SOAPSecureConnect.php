<?php

foreach (glob("../Model/*.php") as $filename) {
    include_once $filename;
}

/**
 * Description of SOAPConnect
 *
 * @author Pretty much Nichlas adjusted to context by Peter
 */
class SOAPSecureConnect {

    const URL = "https://Asus:8182/WebHost/BSIService.svc?wsdl";
    const LOCATION = "https://Asus:8182/WebHost/BSIService.svc/ssl";


    var $client = null;
    
    
    public function __construct($username, $password) {

        try {
            $this->client = new SoapClient(self::URL, 
                    array(
            'UserName' => $username,
            'Password' => $password,
            'trace' => 1,
            'cache_wsdl' => 0,
            'soap_version' => SOAP_1_1,
            'classmap' => array('User' => 'User',
            'Player' => 'Player',
            'Team' => 'Team',
            'TrainingSession' => 'TrainingSession',
            'News' => 'News',
            'Match' => 'Match',
            'Events' => 'Events',
            'ContentInfo' => 'ContentInfo')));
            $this->client->__setLocation(self::LOCATION);


        } catch (Exception $e) {
            error_log($e->getMessage(), '/error/error.txt');
            echo $e->getMessage();
        }
    }

    public function findTeamName($name, $retrieveAssoc) {
        try {
            $params = array('name' => $name,
                'retrieveAssoc' => $retrieveAssoc);
            return $this->client->FindTeamSecure($params)->FindTeamResult;
        } catch (Exception $e) {
//Do stuff...
        }
    }

    public function findPlayer($email) {
        try {
            $params = array('email' => $email);
            return $this->client->FindPlayerSecure($params)->FindPlayerResult;
        } catch (Exception $e) {
           echo $e->getMessage();
        }
    }

    public function deletePlayer($email) {
        try {
            $params = array('email' => $email);
            return $this->client->DeletePlayerSecure($params)->DeletePlayerResult;
        } catch (Exception $e) {
//Do stuff...
        }
    }

    public function getRolesForUser($username) {
        try {
            $params = array('username' => $username);
            return $this->client->GetRolesForUser($params)->GetRolesForUserResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function validateUser($username, $password) {
        try {
            $params = array('username' => $username,
                'password' => $password);
            return $this->client->ValidateUser($params)->ValidateUserResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function createPlayer($username, $password, $firstname, $lastname, $email, $admPri, $type, $number, $gamesplayed, $goals, $penalties) {
        try {
            $params = array('username' => $username,
                'password' => $password,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'admPri' => $admPri,
                'type' => $type,
                'number' => $number,
                'gamesplayed' => $gamesplayed,
                'goals' => $goals,
                'penalties' => $penalties
            );
            return $this->client->CreatePlayerSecure($params)->CreatePlayerResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function createUser($username, $password, $firstname, $lastname, $email, $admPri, $type) {
        try {
            $params = array('username' => $username,
                'password' => $password,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'admPri' => $admPri,
                'type' => $type
            );
            return $this->client->CreateUserSecure($params)->CreateUserResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function createNews($title, $author, $date, $content, $isPublic, $contentType, $picture) {
        try {
            $params = array('title' => $title,
                'author' => $author,
                'date' => $date,
                'content' => $content,
                'isPublic' => $isPublic,
                'contentType' => $contentType,
                'picture' => $picture
            );
            return $this->client->CreateNewsSecure($params)->CreateNewsResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function createMatch($title, $author, $date, $content, $isPublic, $contentType, $startTime, $endTime, $eventType, $opponent, $homegoals, $awaygoals, $team) {
        try {
            $params = array('title' => $title,
                'author' => $author,
                'date' => $date,
                'content' => $content,
                'isPublic' => $isPublic,
                'contentType' => $contentType,
                'endTime' => $endTime,
                'eventType' => $eventType,
                'opponent' => $opponent,
                'homegoals' => $homegoals,
                'awaygoals' => $awaygoals,
                'team' => $team
            );
            return $this->client->CreateMatchSecure($params)->CreateMatchResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function deleteUser($email) {
        try {
            $params = array('email' => $email);
            return $this->client->DeleteUserSecure($params)->DeleteUserResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function findUser($email) {
        try {
            $params = array('email' => $email);
            return $this->client->FindUserSecure($params)->FindUserResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function findMatches($date) {
        try {
            $params = array('date' => $date);
            return $this->client->FindMatchesSecure($params)->FindMatchesResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function findTrainingSessions($date) {
        try {
            $params = array('date' => $date);
            return $this->client->FindTrainingSessionsSecure($params)->FindTrainingSessionsResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function findNews($date) {
        try {
            $params = array('date' => $date);
            return $this->client->FindNewsSecure($params)->FindNewsResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }
    
    public function updateUser($oldFn, $oldLn, $username, $password, $firstname, $lastname, $email, $admPri, $type) {
        try {
            $params = array('oldFn' => $oldFn,
                'oldLn' => $oldLn,
                'username' => $username,
                'password' => $password,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'admPri' => $admPri,
                'type' => $type
            );
            return $this->client->UpdateUserSecure($params)->UpdateUserResult;
        } catch (Exception $e) {
            //Do stuff...
        }        
    }
    
    public function findTeamWithId($id, $retieveAssoc) {
                try {
            $params = array('id' => $id,
                'retrieveAssoc' => $retieveAssoc
            );
            return $this->client->FindTeamWithIdSecure($params)->FindTeamWithIdResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }
}
