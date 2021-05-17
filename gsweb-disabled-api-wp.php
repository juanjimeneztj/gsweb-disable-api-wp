<?php

/*
Plugin Name: Disable API WP
Plugin URI: https://github.com/juanjimeneztj/gsweb-disable-api-wp
Description: This plugin is a solution that we can implement to hide the WordPress REST API and prevent those users who are not registered on our website from accessing our data.
Version: 1.0.0
Author: Juan Jimenez
Author URI: https://juanjimeneztj.com
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: Juan Jimenez
Domain Path: /languages

* @license GPL-2.0-or-later
*/

if(!defined('JUANJ_DISABLED_API_WP_PLUGIN_URL')) {
	define('JUANJ_DISABLED_API_WP_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}

require 'core/gsweb.class.php';

add_action( 'plugins_loaded', array( 'DISABLED_API_WP', 'get_instance' ) );