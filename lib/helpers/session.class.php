<?php
/**
 * @package Adref
 * @author Thomas Palmer
 * @version v1.0.0 13/02/2013 NEW FILE
 */

class session {
    /**
     * - Session Init
     * -----------------------------------------------------------
     *
     */
    public static function init() {
        session_start();
    }

    /**
     * - Session reload
     * -----------------------------------------------------------
     *
     */
    public static function reload() {
        session_regenerate_id();
    }

    /**
     * - Session ID
     * -----------------------------------------------------------
     *
     */
    public static function sessionID() {
        return session_id();
    }

    /**
     * - Session Set
     * -----------------------------------------------------------
     *
     */
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * - Session Get
     * -----------------------------------------------------------
     *
     */
    public static function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : true;
    }

    /**
     * - Session Destroy
     * -----------------------------------------------------------
     *
     */
    public static function destroy() {
        session_unset();
        session_destroy();
    }
}

?>