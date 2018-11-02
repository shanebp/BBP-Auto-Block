<?php

/*
Plugin Name: BBP Auto Block
Description: Block bbPress users after 'x' number of entries are marked as spam
Version: 0.1.0
Author: PhiloPress
Author URI: http://philopress.com/
GitHub Plugin URI: https://github.com/shanebp/bbp-auto-block
GitHub Branch:     production
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
