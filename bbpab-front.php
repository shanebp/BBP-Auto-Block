<?php

if ( ! defined( 'ABSPATH' ) ) exit;


function bbpab_spammed_topic( $topic_id ) {

	$author_id = get_post_field( 'post_author', $topic_id );

	$current_value = get_user_meta( $author_id, 'bbpress_spam_limit', true );

	if ( empty( $current_value ) ) {

		update_user_meta( $author_id, 'bbpress_spam_limit', 1 );

	}

	else {

		$new_value = intval( $current_value ) + 1;

		update_user_meta( $author_id, 'bbpress_spam_limit', $new_value );

		$bbp_spam_limit = get_site_option( '_bbp_spam_limit' );

		if ( $bbp_spam_limit ) {

			if ( intval( $bbp_spam_limit ) < $new_value ) {

				$bbp_blocked_role = bbp_get_blocked_role();

				bbp_set_user_role( $author_id, $bbp_blocked_role );

			}
		}

	}

}
add_action( 'bbp_spammed_topic', 'bbpab_spammed_topic', 99 );
