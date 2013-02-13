<?php
/**
 * @package phpasr
 * @author Thomas Palmer
 * @version v1.0.0 08/02/2013 NEW FILE
 */
 
return array(
	/** 
	 * - Site URL
	 * -----------------------------------------------------------
	 *
	 * The Primary URL that is used throughout the entire website.
	 *
	 */
	'url' => 'phpasr.local',

	/** 
	 * - Default Module
	 * -----------------------------------------------------------
	 *
	 * Default module if no module is passed, e.g. when a user
	 * first nagivates to the site
	 *
	 */
	'default_module' => 'home',

	/** 
	 * - Database
	 * -----------------------------------------------------------
	 *
	 * The database credentials are listed here. MySQL is only
	 * supported at the moment
	 *
	 */
	'db' => array(
		'db_host' => 'localhost',
		'db_user' => 'root',
		'db_pass' => '',
		'db_name' => 'phpasr',
		'db_port' => '3306'
	),
 );
 
?>