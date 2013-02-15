<?php
/**
 * @package Adref
 * @author Thomas Palmer
 * @version v1.0.0 13/02/2013 NEW FILE
 */

class user extends message {
    /** 
     * - User ID
     * -----------------------------------------------------------
     *
     * If the user is logged then we can use $user->userID to
     * return our users ID
     *
     */
    public $userID; 
    
    /** 
     * - Setup
     * -----------------------------------------------------------
     *
     * Set up some information for user to use.
     *
     */
    public function __construct() {
        $this->userID = session::get('userID');
    }
    
    /** 
     * - Login Model
     * -----------------------------------------------------------
     *
     * Model reacts to a the view and controller of the login
     * module
     *
     */
    public function login() {
        if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
            $this->loginEmail = trim($_POST['loginEmail']);
            $this->loginPassword = trim($_POST['loginPassword']);

            if (!empty($this->loginEmail) && !empty($this->loginPassword)) {
                $this->db = new database();
                $this->db->query("SELECT `userID`, `password` FROM `user` WHERE `email`=:email", array(':email' => $this->loginEmail));
                $this->result = $this->db->statement->fetch(PDO::FETCH_ASSOC);
                
                if ($this->db->numRows() != 0) {
                    if ($this->result['password'] == securePass::hashPass($this->loginPassword, $this->result['userID'])) {     
                        session::reload();
                        session::set('userID', $result['userID']);
                        session::set();
                        return array(true, true);
                    }
                    
                    return array(false, 'Incorrect account details');
                }

                return array(false, 'Account not found');
            }

            return array(false, 'Login Empty');
        }
    }
    
    public function loggedIn() {
        return session::get('userID');
    }
    
    public function register() {
        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['confirmEmail']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
            $this->username = trim($_POST['username']);
            $this->email = trim($_POST['email']);
            $this->confirmEmail = trim($_POST['confirmEmail']);
            $this->password = trim($_POST['password']);
            $this->confirmPassword = trim($_POST['confirmPassword']);
            $this->e = array();
            
            if (!empty($this->username) && !empty($this->email) && !empty($this->confirmEmail) && !empty($this->password) && !empty($this->confirmPassword)) {
                $this->db = new database();
                $this->db->query("SELECT `userID` FROM `user` WHERE `username`=:username", array(':username' => $this->username));
                
                if ($this->db->numRow() != 0) {
                   echo 1;
                }
            }
            
            return array(false, 'register fields empty');
        }
    }
}

?>