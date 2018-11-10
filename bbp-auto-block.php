<?php

/*
 * Plugin Name: bbP Auto Block Spammers
 * Description: Block bbPress users after 'x' number of entries are marked as spam
 * Version: 1.0
 * Author: PhiloPress
 * Author URI: https://www.philopress.com/
 * License: GPLv2 or later
 */


defined( 'ABSPATH' ) or die;

function bbpab_init() {

	if ( is_admin() )
		require( dirname( __FILE__ ) . '/bbpab-admin.php' );

	require( dirname( __FILE__ ) . '/bbpab-front.php' );

}
add_action( 'init', 'bbpab_init' );


function bbpab_activation() {

	update_option( '_bbp_spam_limit', '0' );

}
register_activation_hook(__FILE__, 'bbpab_activation');
