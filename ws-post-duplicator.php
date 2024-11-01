<?php
/*   
 Plugin Name: WS Post Duplicator
 Plugin URI: https://wordpress.org/plugins/ws-post-duplicator/
 Description: Simply duplicate post, page, custom post types with custom fields.
 Version: 1.0                    
 Author: WebShouters                   
 Author URI: http://www.webshouters.com/      
 Text Domain: ws-post-duplicator
 Domain Path: /languages/                                        
 License: GPL3                                                                                                                                     
 */                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                                                                                                                                                                                            
define( 'WS_POST_DUPLICATOR_VERSION', '1.0' );
define( 'WS_POST_DUPLICATOR_PLUGIN', __FILE__ );
define( 'WS_POST_DUPLICATOR_PLUGIN_BASENAME', plugin_basename( WS_POST_DUPLICATOR_PLUGIN ) );
define( 'WS_POST_DUPLICATOR_PLUGIN_NAME', trim( dirname( WS_POST_DUPLICATOR_PLUGIN_BASENAME ), '/' ) );
define( 'WS_POST_DUPLICATOR_PLUGIN_DIR', untrailingslashit( dirname( WS_POST_DUPLICATOR_PLUGIN ) ) );

if(!defined('ABSPATH')) exit;
if(!class_exists('WS_POST_DUPLICATOR'))
{
    class WS_POST_DUPLICATOR
    {
        function __construct()
        {
            $this->plugin_includes();
			$this->add_plugin_actions();
        }

        function plugin_includes()
        {
            add_action('plugins_loaded', array($this, 'plugins_loaded_handler'));
        }
		/* Language */
        function plugins_loaded_handler()
        {
            load_plugin_textdomain('ws-post-duplicator', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/'); 
        }
		/* Call Functions */
		public function add_plugin_actions() {
	        require_once WS_POST_DUPLICATOR_PLUGIN_DIR . '/includes/functions.php';
	    }
        
    }
	
    $ws_post_duplicator = new WS_POST_DUPLICATOR();
}
