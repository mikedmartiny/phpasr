<?php
/**
 * @package phpasr
 * @author Thomas Palmer
 * @version v1.0.0 15/02/2013 NEW FILE
 */

class pageController extends siteController {
    public function index() {
        if (isset($_POST['register'])) {
            $this->userActions = new user();
            $this->register = $this->userActions->register();
            
            if ($this->register[0] == false) {
                $this->addMessage('error', $this->login[1]);
            } else if ($this->register[0] == truw) {
                echo 1;
            }            
        }
    }
    
    public function confirm() {
        
    }
}