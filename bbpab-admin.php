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

	<input name="_bbp_spam_limit" id="_bbp_spam_limit" type="number" min="0" step="1" value="<?php bbp_form_option( '_bbp_spam_limit', '0' ); ?>" class="small-text"<?php bbp_maybe_admin_setting_disabled( '_bbp_spam_limit' ); ?> />
	<label for="_bbp_spam_limit"><?php esc_html_e( "Entries marked as spam. When exceeded, user's forum role will be changed to 'Blocked'", 'bbpress' ); ?></label>

<?php
}


// add a field to user edit screen
function bbp_admin_user_spam_entries_count( $profileuser ) {

	if ( ! current_user_can( 'edit_user', $profileuser->ID ) )
		return;

	$spam_count = get_user_meta( $profileuser->ID, 'bbpress_spam_count', true );
	if ( empty( $spam_count ) )
		$spam_count = 0;

	?>

	<h3><?php esc_html_e( 'Forums - Spam Count', 'bbpress' ); ?></h3>

	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="bbp-forums-spam-count"><?php esc_html_e( 'Number of Entries', 'bbpress' ); ?></label></th>
				<td>

					<input name="bbp_spam_count" id="bbp_spam_count" type="number" min="0" step="1" value="<?php echo $spam_count; ?>" class="small-text" />
					<p class="description"><?php _e("Changing this number will not affect user's Forum Role. <br>Please use the selector above to change the user's Forum Role in this context.", "bbpress");?></p>

				</td>
			</tr>

		</tbody>
	</table>

	<?php
}
add_action( 'edit_user_profile', 'bbp_admin_user_spam_entries_count' );


// save spam count field value on user edit screen
function bbp_admin_user_spam_entries_count_update( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;


	if ( $_POST['bbp_spam_count'] == '0' || empty( $_POST['bbp_spam_count'] ) ) {

		delete_user_meta( $user_id, 'bbpress_spam_count' );

		/*
		$bbp_participant_role = bbp_get_participant_role();

		// bug ?
		// role is not changed, probably due to the bbPress Forum Role select box directly above this
		// skip for now and include note on the display

		bbp_set_user_role( $user_id, $bbp_participant_role );
		*/

	}

	else {

		update_user_meta( $user_id, 'bbpress_spam_count', $_POST['bbp_spam_count'] );

		/*
		$bbp_spam_limit = get_option( '_bbp_spam_limit' );

		if ( $bbp_spam_limit ) {

			if ( intval( $bbp_spam_limit ) < intval( $_POST['bbp_spam_count'] ) ) {

				$bbp_blocked_role = bbp_get_blocked_role();

				// bug ?
				// role is not changed, probably due to the bbPress Forum Role select box directly above this
				// skip for now and include note on the display

				bbp_set_user_role( $user_id, $bbp_blocked_role );

			}
		}
		*/

	}

}
add_action( 'edit_user_profile_update', 'bbp_admin_user_spam_entries_count_update', 99 );
