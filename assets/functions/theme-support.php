<?php
	
// Adding WP Functions & Theme Support
function joints_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );
	
	// Default thumbnail size
	set_post_thumbnail_size(125, 125, true);

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );
	
	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );
	
	// Add HTML5 Support
	add_theme_support( 'html5', 
	         array( 
	         	'comment-list', 
	         	'comment-form', 
	         	'search-form', 
	         ) 
	);
	
	// Adding post format support
	 add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	); 
	
	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'joints_theme_support', 1200 );	
	
} /* end theme support */

add_action( 'after_setup_theme', 'joints_theme_support' );

//remove admin bar
add_filter('show_admin_bar', '__return_false');

//add ACF options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

// removes Order Notes Title - Additional Information
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );
//remove Order Notes Field
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );
function remove_order_notes( $fields ) {
 unset($fields['order']['order_comments']);
 return $fields;
}

add_filter('woocommerce_login_redirect', 'wc_login_redirect');
 
function wc_login_redirect( $redirect_to ) {
     $redirect_to = get_permalink( 11 );
     return $redirect_to;
}

/**
 * AUTO COMPLETE PAID ORDERS IN WOOCOMMERCE
 */
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_paid_order', 10, 1 );
function custom_woocommerce_auto_complete_paid_order( $order_id ) {
  if ( ! $order_id ) {
    return;
  }

  $order = wc_get_order( $order_id );

  // No updated status for orders delivered with Bank wire, Cash on delivery and Cheque payment methods.
  if ( ( get_post_meta($order->id, '_payment_method', true) == 'bacs' ) || ( get_post_meta($order->id, '_payment_method', true) == 'cod' ) || ( get_post_meta($order->id, '_payment_method', true) == 'cheque' ) ) {
    return;
  } 
  // "completed" updated status for paid Orders with all others payment methods
  else {
    $order->update_status( 'completed' );
  }
}