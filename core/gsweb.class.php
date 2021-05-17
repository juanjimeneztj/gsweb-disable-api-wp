<?php

define('JUANJBASEURL',plugin_dir_url(__DIR__));

class gsweb {

	private static $instance;
	protected $templates;

	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new gsweb();
		}

		return self::$instance;

	}

	private function __construct() {
        add_filter( 'rest_authentication_errors', array('gsweb', 'init'), 0, 1);
	}

  public function init(){
      if ( ! empty( $result ) ) {
        return $result;
      }
      if ( ! is_user_logged_in() ) {
        return new WP_Error( 'User not logged in', 'You are not currently logged in. To consume the API of this website you need to be currently logged in', array( 'status' => 401 ) );
      }
      if ( ! current_user_can( 'administrator' ) ) {
        return new WP_Error( 'Invalid User', 'You are not an administrator. To consume the API of this website, you must be currently logged in and be an administrator', array( 'status' => 401 ) );
      }
      return $result;
  }

}