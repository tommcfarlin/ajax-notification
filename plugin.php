<?php
/*
Plugin Name: Ajax Notification
Plugin URI: http://github.com/tommcfarlin/ajax-notification
Description: An example plugin used to demonstrate the WordPress Ajax API for a companion article on Envato's WPTuts+ site
Version: 1.0
Author: Tom McFarlin
Author URI: http://tommcfarlin.com
Author Email: tom@tommcfarlin.com
License:

  Copyright 2012 Tom McFarlin (tom@tommcfarlin.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  
*/

class Ajax_Notification {
	 
	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
	
	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {
	
		register_activation_hook( __FILE__, array( &$this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( &$this, 'deactivate' ) );
		add_action( 'admin_notices', array( &$this, 'display_admin_notice' ) );

	} // end constructor
	
	/**
	 * Fired when the plugin is activated.
	 *
	 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog 
	 */
	function activate( $network_wide ) {
		add_option( 'hide_ajax_notification', false );
	} // end activate
	
	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog 
	 */
	function deactivate( $network_wide ) {
		delete_option( 'hide_ajax_notification' );
	} // end deactivate
	
	/*--------------------------------------------*
	 * Core Functions
	 *---------------------------------------------*/
	
	function display_admin_notice() {
    	
    	$html = '<div id="ajax-notification" class="updated">';
    		$html .= '<p>';
    			$html .= 'The Ajax Notification example plugin is active. This message will appear until you choose to <a href="javascript:;" id="dismiss-ajax-notification">dismiss it</a>.';
    		$html .= '</p>';
    		$html .= '<span id="ajax-notification-nonce" class="hidden">' . wp_create_nonce( 'ajax-notification-nonce' ) . '</span>';
    	$html .= '</div><!-- /.updated -->';
    	
    	echo $html;
    	
	} // end display_admin_notice
  
} // end class

new Ajax_Notification();
?>