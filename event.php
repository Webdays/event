<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   Event
 * @author    Cherif BOUCHELAGHEM <cherif.bouchelaghem@gmail.com>
 * @license   GPL-2.0+
 * @link      http://cherifbouchelaghem.com
 * @copyright 2014 Cherif BOUCHELAGHEM or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       Event
 * Plugin URI:        http://cherifbouchelaghem.com
 * Description:       Event plugin
 * Version:           1.0.0
 * Author:            Cherif BOUCHELAGHEM
 * Author URI:        http://cherifbouchelaghem.com
 * Text Domain:       event-text-domain
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 * WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-event.php` with the name of the plugin's class file
 *
 */

require plugin_dir_path(__FILE__ ).'includes/classes/class-cpt-factory.php';
require plugin_dir_path(__FILE__ ).'admin/includes/classes/class-speaker-meta-box-factory.php';

require plugin_dir_path(__FILE__ ).'admin/includes/classes/class-event-meta-box.php';

require plugin_dir_path(__FILE__ ).'admin/includes/classes/class-talk-meta-box-factoy.php';
require plugin_dir_path(__FILE__ ).'admin/includes/classes/class-location-meta-box.php';

require plugin_dir_path(__FILE__ ).'admin/includes/classes/class-event-page-template.php';

require_once( plugin_dir_path( __FILE__ ) . 'public/includes/models/Speaker.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/includes/functions.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-event.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace Event with the name of the class defined in
 *   `class-event.php`
 */
register_activation_hook( __FILE__, array( 'Event', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Event', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace Event with the name of the class defined in
 *   `class-event.php`
 */
add_action( 'plugins_loaded', array( 'Event', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-event-admin.php` with the name of the plugin's admin file
 * - replace Event_Admin with the name of the class defined in
 *   `class-event-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-event-admin.php' );
	add_action( 'plugins_loaded', array( 'Event_Admin', 'get_instance' ) );

}
