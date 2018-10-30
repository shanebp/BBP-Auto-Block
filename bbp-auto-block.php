<?php

/*
Plugin Name: BBP Auto Block
Description: Block bbPress users after 'x' number of entries are marked as spam
Version: 0.1.0
Author: PhiloPress
Author URI: http://philopress.com/
Text Domain: bbpab
Domain Path: /languages/
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

