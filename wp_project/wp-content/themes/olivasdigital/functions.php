<?php
/**
 * @author    Olivas Digital
 * @copyright 2024 Olivas Digital
 * @license   GPL-2.0+
 */

use OD\Theme;

define( 'OD_VERSION', wp_get_theme()->version );
define( 'OD_DIR', __DIR__ );
define( 'OD_URL', get_template_directory_uri() );

require_once OD_DIR . '/vendor/autoload.php';

function od_is_dev() {
	return apply_filters( 'od_is_dev', defined( 'WP_ENV' ) && 'development' === WP_ENV );
}

/**
 * Setup theme.
 *
 * @since 1.0.0
 */
add_action( 'after_setup_theme', 'od_setup_theme' );

function od_setup_theme() {
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	$components = array(
		'structure_content'    => new OD\Theme\Structure\Content(),
		'structure_comments'   => new OD\Theme\Structure\Comments(),
		'structure_navigation' => new OD\Theme\Structure\Navigation(),
		'structure_sidebar'    => new OD\Theme\Structure\Sidebar(),
		'structure_sidebar'    => new OD\Theme\Templates\Partials\Pagination(),
		'acfjson'              => new OD\Theme\Acfjson(),
		'assets'               => new OD\Theme\Assets(),
		'body_slug_classes'    => new OD\Theme\BodySlugClasses(),
		'customizer'           => new OD\Theme\Customizer(),
		'images'               => new OD\Theme\Images(),
		'mimetypes'            => new OD\Theme\MimeTypes(),
		'acfoptions'           => new OD\Theme\Options(),
		'scripts'              => new OD\Theme\Scripts(),
		'styles'               => new OD\Theme\Styles(),
		'widgets'              => new OD\Theme\Widgets(),
	);
	/**
	 * Remove/add components.
	 *
	 * Note: if you add a component, make sure it implements a method "ready()".
	 */
	$components = apply_filters( 'od_starter_components', $components );

	foreach ( $components as $instance ) {
		if ( method_exists( $instance, 'ready' ) ) {
			$instance->ready();
		}
	}
}

add_filter(
	'default_page_template_title',
	function() {
		return __( '-- SELECIONE UM MODELO --', 'od_setup_theme' );
	}
);
