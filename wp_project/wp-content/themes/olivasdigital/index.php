<?php

/**
 * The default single page template.
 *
 * @author OlivasDigital 
 * @since 1.0.0
 *
 * @package OlivasDigital
 */

namespace OD;

get_header(); ?>
	<section class="all-projects">
		<div class="container">
			<h1 class="all-projects__title">
				Todos os Projetos
			</h1>

			<?php
				$args = array(
					'post_type' => 'projects',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order' => 'ASC'
				);
				
				$custom_query = new \WP_Query( $args );
				
				if ( $custom_query->have_posts() ) { ?>
					<ul class="all-projects__list">
						<?php while ( $custom_query->have_posts() ) {
							$custom_query->the_post(); ?>
							<li class="all-projects__item">
								<a class="all-projects__link" href="<?php the_permalink(); ?>">
									<h2 class="all-projects__link-title">
										<?php echo get_the_title(); ?>
									</h2>
									<p class="all-projects__link-excerpt">
										<?php echo get_the_excerpt(); ?>
									</p>
								</a>
							</li>
						<?php } ?>
					</ul> <?php 
					wp_reset_postdata();
				} else { ?>
					<p class="">
						Nenhum post cadastrado
					</p>
					<?php
				}
			?>
		</div>
	</section>
<?php
get_footer();
