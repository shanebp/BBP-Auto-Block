<?php

if ( ! defined( 'ABSPATH' ) ) exit;



function bbpab_admin_setting( $settings ) {

	$settings['bbp_settings_users']['_bbp_spam_limit'] = array(
			'title'             => __( 'Spam Limit', 'bbpress' ),
			'callback'          => 'bbp_admin_setting_callback_spam_limit',
			'sanitize_callback' => 'intval',
			'args'              => array()
		);

	return $settings;

}
add_filter( 'bbp_admin_get_settings_fields', 'bbpab_admin_setting', 99 );


function bbp_admin_setting_callback_spam_limit() {
?>

	<input name="_bbp_spam_limit" id="_bbp_spam_limit" type="number" min="0" step="1" value="<?php bbp_form_option( '_bbp_spam_limit', '2' ); ?>" class="small-text"<?php bbp_maybe_admin_setting_disabled( '_bbp_spam_limit' ); ?> />
	<label for="_bbp_spam_limit"><?php esc_html_e( "Entries marked as spam. When exceeded, user's forum role will be changed to 'Blocked'", 'bbpab' ); ?></label>

<?php
}
