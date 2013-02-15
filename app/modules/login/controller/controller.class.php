<?php
/**
 * @package phpasr
 * @author Thomas Palmer
 * @version v1.0.0 13/02/2013 NEW FILE
 */

class pageController extends siteController {
    public function index() {
        if (isset($_POST['login'])) {
            $this->userActions = new user();
            $this->login = $this->userActions->secureLogin();
            
            if ($this->login[0] == false) {
                $this->addMessage('error', $this->login[1]);
            } else if ($this->login[0] == true) {
                header("Location: ".config::get('default_module'));
                exit;
            }
        }           
    }
}