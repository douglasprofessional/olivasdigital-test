<?php

/**
 * Template Name: Contato
 *
 * @author OlivasDigital
 * @since 1.0.0
 *
 * @package OlivasDigital
 */

namespace OD;

get_header(); ?>

	<section class="contact">
		<div class="container">
			<div class="contact__content">
				<h1 class="contact__title">
					<?php echo get_the_title(); ?>
				</h1>

				<?php the_content(); ?>
			</div>
		</div>
	</section>

<?php
get_footer();
