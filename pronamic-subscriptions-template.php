<?php

/**
 * Check capability of the subscription post
 * 
 * @param string $capability
 * @param string $post_id
 * @return true if subscript post has capability, false otherwise
 */
function pronamic_subscription_can( $capability, $post_id = null ) {
	$post_id = ( null === $post_id ) ? get_the_ID() : $post_id;

	$subscription_role = get_post_meta( $post_id, '_pronamic_subscription_role', true );

	$role = get_role( $subscription_role );

	if ( ! empty( $role ) ) {
		return $role->has_cap( $capability );
	} else {
		return false;
	}
}

/**
 * Display the subscription price
 * 
 * @param string $post_id
 * @return string subscription price
 */
function pronamic_subscription_the_price( $post_id = null ) {
	$post_id = ( null === $post_id ) ? get_the_ID() : $post_id;

	$price = get_post_meta( $post_id, '_pronamic_subscription_price', true );

	if ( !empty( $price ) ) {
		echo '&euro; ', number_format( $price, 2, ',', '.' );
	}
}

/**
 * Check capaibility of the post
 * 
 * @param string $capability
 * @param string $post_id
 * @return true if post post has capability, false otherwise
 */
function pronamic_post_can( $capability, $post_id = null ) {
	$post_id = ( null === $post_id ) ? get_the_ID() : $post_id;

	$subscription_id = get_post_meta( $post_id, '_pronamic_subscription_id', true );

	return pronamic_subscription_can( $capability, $subscription_id );
}
