<?php
/**
 * @package Adref
 * @author Thomas Palmer
 * @version v1.0.0 7/02/2013 NEW FILE
 */

class routing {

    /**
     * - URI
     * -----------------------------------------------------------
     *
     * URI holds the language, module and action
     * 
     *
     */
    protected $uri;

    /**
     * - Secured
     * -----------------------------------------------------------
     *
     * Holds an array of secured routes and modules
     * 
     *
     */
    public $secured;

    /**
     * - Module
     * -----------------------------------------------------------
     *
     * We need something for us to store the value of module. This
     * will be used to pass the values back to the main class
     * 
     *
     */
    public $module;

    /**
     * - Action
     * -----------------------------------------------------------
     *
     * We need something for us to store the value of action. This 
     * will be used to pass the values back to the main class
     * 
     *
     */
    public $action;

    public function __construct($defaultModule) {
        $this->secured = require_once appConfig . 'secured.php';
        /**
         * - Explode and assign
         * -----------------------------------------------------------
         *
         * Explode our URI to start routing the apps thorugh modules
         * and index.
         *
         */
        if (isset($_GET['uri'])) {
            $this->uri = explode('/', trim($_GET['uri']), 3);

            if (!empty($this->uri[0])) {
                $this->module = $this->uri[0];
            }

            if (!empty($this->uri[1])) {
                $this->action = $this->uri[1];
            }

            if (!empty($this->uri[2])) {
                $this->arg = $this->uri[2];
            }
        }

        //return $this->uri;

        /**
         * - Default
         * -----------------------------------------------------------
         *
         * If any of our values are empty then we need to default to 
         * the config or hard coded defaults.
         *
         */
        if (empty($this->module)) {
            $this->module = $defaultModule;
        }

        if (empty($this->action)) {
            $this->action = 'index';
        }

        /**
         * - 404
         * -----------------------------------------------------------
         *
         * Check for our 404's, don't want any nasty surpises for the 
         * user.
         *
         */
        $this->modules = scandir(appModules);
        if (!in_array($this->module, $this->modules)) {
            $this->module = '404';
            $this->action = 'index';
        } else {
            /* require_once appModules.$this->module.'/controller/controller.class.php';
              $this->actions = get_class_methods('pageController');
              if (!in_array($this->action, $this->actions)) {
              $this->module = '404';
              $this->action = 'index';
              } */
        }

        /**
         * - Secured
         * -----------------------------------------------------------
         *
         * If any of the modules or routes are in the secured array, 
         * then display the login page.
         *
         */
        if (in_array($this->module, $this->secured) || in_array($this->module . '/' . $this->action, $this->secured)) {
            if (!isset($_SESSION['userID'])) {
                $this->module = 'login';
                $this->action = 'index';
            }
        }
    }
}