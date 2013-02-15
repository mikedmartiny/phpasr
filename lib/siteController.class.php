<?php
/**
 * @package phpasr
 * @author Thomas Palmer
 * @version v1.0.0 13/02/2013 NEW fILE
 */

class siteController extends message {
    /**
     * - Module
     * -----------------------------------------------------------
     *
     * We can use this when constructing nav bars to workout which
     * link is currently active.
     *
     */
    public $module;

    /**
     * - Action
     * -----------------------------------------------------------
     *
     * This can also be used for navs.
     *
     */
    public $action;
    
    /**
     * - Action
     * -----------------------------------------------------------
     *
     * Sometimes we want to pass get variables through to our 
     * controller
     *
     */
    public $arg;

    /**
     * - Page Content
     * -----------------------------------------------------------
     *
     * Page content property to allow parsing between the 
     * controller and the view.
     *
     */
    public $pageContent;

    /**
     * - Meta
     * -----------------------------------------------------------
     *
     * Same as config, only for meta information this time.
     *
     */
    public $meta;

    /**
     * - Anchor
     * -----------------------------------------------------------
     *
     * Anchor is a help for constructing a link.
     *
     */
    public $anchor;

    /**
     * - Show Template
     * -----------------------------------------------------------
     *
     * Show the template of the app which will then trigger a few
     * other events
     *
     */
    public function showTemplate() {
        require_once appTemplate . 'site.php';
    }

    /**
     * - Show Page
     * -----------------------------------------------------------
     *
     * Show Page is called inside of the page template which calls
     * the controller for the route and the view
     *
     */
    public function showPage() {
        $method = $this->action;
        $this->$method();
        require_once appModules . $this->module . '/view/' . $method . '.php';
    }
}