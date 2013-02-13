<?php
/**
 * @package phpasr
 * @author Thomas Palmer
 * @version v1.0.0 13/02/2013 NEW FILE
 */

class app {
	public function __construct() {
		$this->appInit();
	}

	public function appInit() {
		/** 
		 * -  Definitions
		 * -----------------------------------------------------------
		 *
		 * Need some definitions to help with controlling 
		 * the framework.
		 *
		 */
		define('app', dirname(__FILE__).'/../app/', true);
		define('lib', dirname(__FILE__).'/../lib/', true);
		define('helpers', lib.'helpers/', true);
		define('routing', lib.'routing/', true);
		define('web', dirname(__FILE__).'/../web/', true);

		/** 
		 * - App Definitions
		 * -----------------------------------------------------------
		 *
		 * Create some definitions to help our productivity and 
		 * quickly access files and folders
		 *
		 */
		define('appClasses', app.'classes/', true);
		define('appConfig', app.'config/', true);
		define('appModules', app.'modules/', true);
		define('appTemplate', app.'template/', true);


		/** 
		 * - App Files
		 * -----------------------------------------------------------
		 *
		 * We need some app files such as config and secured routes
		 *
		 */
		$meta = require_once appConfig.'meta.php';
		$config = require_once appConfig.'config.php';

		/** 
		 * - App Assets
		 * -----------------------------------------------------------
		 *
		 * Create some asset definitions to help us further down the 
		 * line of developement
		 *
		 */
		define('url', 'http://'.$config['url'].'/', true);
		define('web_assets', url.'assets/', true);
		define('web_css', web_assets.'css/', true);
		define('web_img', web_assets.'img/', true);
		define('web_js', web_assets.'js/', true);

		/** 
		 * - lIBS
		 * -----------------------------------------------------------
		 * 
		 * PHPASR needs some libs to do the stuff that makes all
		 * magic and kittens appear. Well not quite
		 * 
		 */
		require_once lib.'siteController.class.php';
		require_once helpers.'database.class.php';

		/** 
		 * - Routing
		 * -----------------------------------------------------------
		 *
		 * Route to the correct language - if set, module and action. 
		 * We could also 404 the user. We also check whether or not
		 * the route is secured or not
		 *
		 */
		require_once routing.'routing.class.php';
		$routing = new routing($config['default_module']);

		/** 
		 * - Start an app
		 * -----------------------------------------------------------
		 *
		 * We start an app depending on the app name passed through.
		 * The routing class gives us to information to work with.
		 *
		 */
		require_once appModules.$routing->module.'/controller/controller.class.php';

		$init = new pageController();
		$init->module = $routing->module;
		$init->action = $routing->action;
		$this->config = $config;
		$init->meta = $meta;
		$init->showTemplate();
	}
}