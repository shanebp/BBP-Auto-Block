<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// handle spam topic or reply re author
function bbpab_spammed_topic_or_reply( $post_id ) {

	$user_id = get_post_field( 'post_author', $post_id );

	$bbp_spam_limit = intval( get_option( '_bbp_spam_limit' ) );

	$current_value = get_user_option( 'bbpress_spam_count', $user_id );

	$new_value = 0;

	if ( empty( $current_value ) ) {

		$current_value = 1;

		update_user_option( $user_id, 'bbpress_spam_count', $current_value );

	} else {

		$new_value = intval( $current_value ) + 1;

		update_user_option( $user_id, 'bbpress_spam_count', $new_value );

	}

	if ( $bbp_spam_limit < $new_value || $bbp_spam_limit < $current_value ) {

		$bbp_blocked_role = bbp_get_blocked_role();

		bbp_set_user_role( $user_id, $bbp_blocked_role );

	}

}
add_action( 'bbp_spammed_topic', 'bbpab_spammed_topic_or_reply', 99 );
add_action( 'bbp_spammed_reply', 'bbpab_spammed_topic_or_reply', 99 );



// handle unspam topic or reply re author
function bbpab_unspammed_topic_or_reply( $post_id ) {

	$user_id = get_post_field( 'post_author', $post_id );

	$current_value = get_user_option( 'bbpress_spam_count', $user_id );

	if ( empty( $current_value ) ) {

		return;

	} else {

		$new_value = intval( $current_value ) - 1;

		if ( $new_value < 1 ) {

			delete_user_option( $user_id, 'bbpress_spam_count' );

		} else {

			update_user_option( $user_id, 'bbpress_spam_count', $new_value  );
		}
		$bbp_spam_limit = get_option( '_bbp_spam_limit' );

		if ( intval( $bbp_spam_limit ) >= $new_value ) {

			$bbp_participant_role = bbp_get_participant_role();

			bbp_set_user_role( $user_id, $bbp_participant_role );

		}

	}

}
add_action( 'bbp_unspammed_topic', 'bbpab_unspammed_topic_or_reply', 99 );
add_action( 'bbp_unspammed_reply', 'bbpab_unspammed_topic_or_reply', 99 );
