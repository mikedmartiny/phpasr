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
    public function secureLogin() {
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
        return isset(session::get('userID')) ? true : false;
    }
}

?>