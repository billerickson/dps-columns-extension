<?php
/**
 * Plugin Name: Columns Extension for Display Posts Shortcode
 * Plugin URI: https://github.com/billerickson/dps-columns-extension
 * Description: Display posts in columns using [display-posts columns="2"]
 * Version: 1.0.0
 * Author: Bill Erickson
 * Author URI: http://www.billerickson.net
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package DPS Columns Extension
 * @version 1.0.0
 * @author Bill Erickson <bill@billerickson.net>
 * @copyright Copyright (c) 2016, Bill Erickson
 * @link http://www.billerickson.net/shortcode-to-display-posts/
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Column Classes
 *
 * @param array $classes, current CSS classes
 * @param object $post, the post object
 * @param object $listing, the WP Query object for the listing
 * @param array $atts, original shortcode attributes
 * @return array $classes, modified CSS classes
 */
function be_dps_column_classes( $classes, $post, $listing, $atts ) {

	if( ! isset( $atts['columns'] ) )
		return $classes;
	
	$columns = intval( $atts['columns'] );
	if( $columns < 2 || $columns > 6 )
		return $classes;
		
	$column_classes = array( '', '', 'one-half', 'one-third', 'one-fourth', 'one-fifth', 'one-sixth' );
	$classes[] = $column_classes[$columns];
	if( 0 == $listing->current_post % $columns )
		$classes[] = 'first';
	return $classes;

}
add_filter( 'display_posts_shortcode_post_class', 'be_dps_column_classes', 10, 4 );

/**
 * Column Class Styles 
 *
 */
function be_dps_column_class_styles() {

	if( apply_filters( 'dps_columns_extension_include_css', true ) )
		wp_enqueue_style( 'dps-columns', plugins_url( 'dps-columns.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'be_dps_column_class_styles' );