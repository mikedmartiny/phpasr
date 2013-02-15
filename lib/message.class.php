<?php
/**
 * @package phpasr
 * @author Thomas Palmer
 * @version v1.0.0 15/02/2013 NEW FILE
 */

class message {
    /**
     * - Errors
     * -----------------------------------------------------------
     *
     * Hold our errors so that we can add to in the controller and
     * display in the view
     *
     */
    private $error = array();
    
    /**
     * - Info
     * -----------------------------------------------------------
     *
     * Holds information that we want to give to the user, just 
     * the sames as error
     *
     */
    private $info = array();
    
    /**
     * - Add to message arrays
     * -----------------------------------------------------------
     *
     * We can add to any of your message arrays by passing through
     * the mode.
     *
     */
    public function addMessage($mode, $message) {
        switch ($mode) {
            case 'error':
                $this->error[] = $message;
                break;
            case 'info':
                $this->info[] = $message;
                break;
        }
    }
    
    /**
     * - Message Writer
     * -----------------------------------------------------------
     *
     * Returns any information in any of our message arrays. 
     *
     */
    public function messageWriter() {
        $this->data = null;
        
        if (!empty($this->error)) {
            $this->data .= '<span class="text-error">';
            foreach ($this->error as $v) {
                $this->data .= $v . '<br>';
            }
            $this->data .= '</span>';
        } else if (!empty($this->info)) {
            $this->data .= '<span class="text-info">';
            foreach ($this->info as $v) {
                $this->data .= $v . '<br>';
            }
            $this->data .= '</span>';
        }
        
        return $this->data;
    }
}

?>