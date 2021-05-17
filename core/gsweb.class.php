<?php

define('JUANJBASEURL',plugin_dir_url(__DIR__));

if(!class_exists('DISABLED_API_WP')){

  class DISABLED_API_WP {
  
    private static $instance;
    protected $templates;
  
    public static function get_instance() {
  
      if ( null == self::$instance ) {
        self::$instance = new DISABLED_API_WP();
      }
  
      return self::$instance;
  
    }
  
    private function __construct() {
          add_filter( 'rest_authentication_errors', array('DISABLED_API_WP', 'init'), 0, 1);
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
}else{
  add_action( 'admin_notices', 'disabled_api_wp_general_messages');
  if(!function_exists('disabled_api_wp_general_messages')){
    function disabled_api_wp_general_messages() {
      echo '<div class="notice notice-error is-dismissible"><h3>Disable the plugin "Disable API WP"</h3><p>The plugin class could not be activated because another class with the same name already exists, One of the possible and most common problems is that it may be possible that you already have this plugin installed, please contact the plugin developer to solve your problem. <a href="https://juanjimeneztj.com" target="_blank">Contact</a></p><p>The plugin may appear activated but it will not perform any action and it may have a conflict with another of the plugins.</p></div>';
    }
  }
}