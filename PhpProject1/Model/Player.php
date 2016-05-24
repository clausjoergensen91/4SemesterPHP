<?php
include_once 'User.php';
/**
 * Description of Player
 *
 * @author Nichlas
 */
class Player extends User{
    var $Number;
    var $GamesPlayed;
    var $Goals;
    var $Penalties;
    
    public function __construct($username, $password, $firstname, $lastname, $email, $admPri, $type, $id, 
            $number, $gamesplayed, $goals, $penalties) {
        User::User($username, $password, $firstname, $lastname, $email, $admPri, $type, $id);
        $this->Numberumber = $number;
        $this->GamesPlayedamesPlayed = $gamesplayed;
        $this->Goals = $goals;
        $this->Penalties = $penalties;
    }
}
