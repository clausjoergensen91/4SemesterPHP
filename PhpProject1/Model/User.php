<?php
/**
 * Description of Player
 *
 * @author Nichlas
 */
class User {
    var $UserName;
    var $Password;
    var $FirstName;
    var $LastName;
    var $Email;
    var $AdminPrivilege;
    var $Type;
    var $Id;

    public function __construct($username, $password, $firstname, $lastname, $email, $admPri, $type, $id) {
        $this->UserName = $username;
        $this->Password = $password;
        $this->FirstName = $firstname;
        $this->LastName = $lastname;
        $this->Email = $email;
        $this->AdminPrivilege = $admPri;
        $this->Type = $type;
        $this->Id = $id;
    }    
}
