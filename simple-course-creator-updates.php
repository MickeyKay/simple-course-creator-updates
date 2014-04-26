<?php
/**
 * Plugin Name: Simple Course Creator - Updates
 * Plugin URI: http://kolakube.com/guides/scc-updates/
 * Description: Use the SCC Updates addon to list the newest posts from your courses or stories in a timeline format.
 * Version: 1.0.0
 * Author: Alex Mangini
 * Author URI: http://kolakube.com/about/
 * Author email: alex@kolakube.com
 * License: GPL2
 * Requires at least: 3.8
 * Tested up to: 3.8
 * Text Domain: sccu
 * Domain Path: /languages/
 *
 * This plugin requires Simple Course Creator for use, and much of
 * the code / file structure in this plugin was taken from Simple
 * Course Creator's core. 
 *
 * This plugin is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 * 
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see http://www.gnu.org/licenses/.
 *
 * @package Simple Course Creator
 * @category Updates
 * @author Alex Mangini
 * @license GNU GENERAL PUBLIC LICENSE Version 2 - /license.txt
*/

if ( ! defined( 'ABSPATH' ) ) exit; // no accessing this file directly


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'simple-course-creator/simple-course-creator.php' ) ) :
/**
 * primary class for Simple Course Creator Updates
 *
 * @since 1.0.0
 */
class Simple_Course_Creator_Updates {


	/**
	 * constructor for Simple_Course_Creator_Updates class
	 *
	 * Set up the basic plugin environment and with definitions,
	 * plugin information, and required plugin files.
	 */
	public function __construct() {

		// define plugin name
		define( 'SCCU_NAME', 'Simple Course Creator Updates' );
		
		// define plugin version
		define( 'SCCU_VERSION', '1.0.0' );
		
		// define plugin directory
		define( 'SCCU_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		
		// define plugin root file
		define( 'SCCU_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		// load text domain
		add_action( 'init', array( $this, 'load_textdomain' ) );	

		// require additional plugin files
		$this->includes();
	}
	

	/**
	 * load SCCU textdomain
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'sccu', false, SCCU_DIR . 'languages' );
	}


	/**
	 * require additional plugin files
	 */
	private function includes() {
		require_once( SCCU_DIR . 'includes/display/class-sccu-updates-listing.php' );	// display updates listing
		require_once( SCCU_DIR . 'includes/display/functions.php' );	// display functions
	}
}
new Simple_Course_Creator_Updates();
endif; // end check to see if SCC is activated