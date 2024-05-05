<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OlivasDigital
 */

namespace OD;

get_template_part( 'template-parts/site-header/document-start' );

?>

	<header class="site-header">
		<div class="container">
			<div class="site-header__content">
				<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'mainmenu__container',
							'menu_id'         => 'mainmenuid',
							'menu_class'      => 'mainmenu__list',
						)
					);
				?>
			</div>
		</div>
	</header>

	<main class="main <?php echo is_404() ? 'main--404' : ''; ?>">
