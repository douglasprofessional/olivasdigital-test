<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package olivasdigital
 */

get_header();

if ( have_posts() ) {

	get_template_part( 'template-parts/content/content' );

} else {

	get_template_part( 'template-parts/content/content', 'none' );

}

get_footer();
