<?php
/**
 * This file adds functions and actions for classes.
 *
 * @author OlivasDigital 
 * @since 1.0.0
 *
 * @package OlivasDigital
 */

namespace OD;

add_filter(
	'body_class',
	function ( $classes ) {

		if ( is_singular( array( 'post', 'page' ) ) ) {
			$classes[] = 'singular';
		}

		if ( is_front_page() ) {
			$classes[] = 'front-page';
		}

		return $classes;
	}
);
