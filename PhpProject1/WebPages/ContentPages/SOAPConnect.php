<?php

foreach (glob("../Model/*.php") as $filename) {
    include_once $filename;
}

/**
 * Description of SOAPConnect
 *
 * @author Nichlas
 */
class SOAPConnect {

    const URL = "https://Asus:8182/WebHost/BSIService.svc?wsdl";
    const LOCATION = "https://Asus:8182/WebHost/BSIService.svc/norm";
    const SOAPPARAMS = array(
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
            'ContentInfo' => 'ContentInfo')
    );

    var $client = null;

    public function __construct() {
        try {
            $this->client = new SoapClient(self::URL, self::SOAPPARAMS);
            $this->client->__setLocation(self::LOCATION);
        } catch (Exception $e) {
            //error_log($e->getMessage(), '/error/error.txt');
        }
    }

    public function findTeamName($name, $retrieveAssoc) {
        try {
            $params = array('name' => $name,
                'retrieveAssoc' => $retrieveAssoc);
            return $this->client->FindTeam($params)->FindTeamResult;
        } catch (Exception $e) {
//Do stuff...
        }
    }

    public function findPlayer($email) {
        try {
            $params = array('email' => $email);
//            return $this->client->__soapCall('FindPlayerSecure', $params)->FindPlayerResult;
            return $this->client->FindPlayerSecure($params)->FindPlayerResult;
        } catch (Exception $e) {
           echo $e->getMessage();
        }
    }

    public function deletePlayer($email) {
        try {
            $params = array('email' => $email);
            return $this->client->DeletePlayer($params)->DeletePlayerResult;
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
            return $this->client->CreatePlayer($params)->CreatePlayerResult;
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
            return $this->client->CreateUser($params)->CreateUserResult;
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
            return $this->client->CreateNews($params)->CreateNewsResult;
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
            return $this->client->CreateMatch($params)->CreateMatchResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function deleteUser($email) {
        try {
            $params = array('email' => $email);
            return $this->client->DeleteUser($params)->DeleteUserResult;
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
            return $this->client->FindMatches($params)->FindMatchesResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function findTrainingSessions($date) {
        try {
            $params = array('date' => $date);
            return $this->client->FindTrainingSessions($params)->FindTrainingSessionsResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function findNews($date) {
        try {
            $params = array('date' => $date);
            return $this->client->FindNews($params)->FindNewsResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function findOneNews($date) {
        try {
            $params = array('date' => $date);
            return $this->client->getOneNews($params)->getOneNewsResult;
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
            return $this->client->UpdateUser($params)->UpdateUserResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

    public function findTeamWithId($id, $retieveAssoc) {
        try {
            $params = array('id' => $id,
                'retrieveAssoc' => $retieveAssoc
            );
            return $this->client->FindTeamWithId($params)->FindTeamWithIdResult;
        } catch (Exception $e) {
            //Do stuff...
        }
    }

}
