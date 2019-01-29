<?php

/*
 * Plugin Name: bbP Auto Block Spammers
 * Description: Block bbPress users after 'x' number of entries are marked as spam
 * Version: 1.1
 * Author: PhiloPress
 * Author URI: https://www.philopress.com/
 * License: GPLv2 or later
 */


defined( 'ABSPATH' ) or die;

function bbpab_init() {

	if ( is_admin() ) {
		require( dirname( __FILE__ ) . '/bbpab-admin.php' );
	}

	require( dirname( __FILE__ ) . '/bbpab-front.php' );

}
add_action( 'init', 'bbpab_init' );


function bbpab_activation() {

	bbpab_check();

	update_option( '_bbp_spam_limit', '0' );

}
register_activation_hook(__FILE__, 'bbpab_activation');

function bbpab_check() {
	if ( !class_exists('bbPress') ) {
		add_action( 'admin_notices', 'bbpab_install_bbpress_notice' );
	}
}
add_action('plugins_loaded', 'bbpab_check', 999);

function bbpab_install_bbpress_notice() {
	echo '<div id="message" class="error fade"><p style="line-height: 150%">';
	_e('bbP Auto Block Spammers requires the bbPress plugin. Please install bbPress first, or deactivate bbP Auto Block Spammers.', 'bbpress');
	echo '</p></div>';
}
