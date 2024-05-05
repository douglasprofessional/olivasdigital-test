<?php

/**
 * The default page template
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
			<div class="all-projects__content">
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
									<a class="all-projects__link all-projects__link--home" href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) { ?>
											<div class="all-projects__link-thumbnail">
												<?php echo get_the_post_thumbnail( get_the_ID() ); ?>
											</div>						
										<?php } ?>	

										<div class="all-projects__infos">
											<h2 class="all-projects__link-title">
												<?php echo get_the_title(); ?>
											</h2>
											<p class="all-projects__link-excerpt">
												<?php echo get_the_excerpt(); ?>
											</p>

											<div class="all-projects__link-type">
												<?php
													$taxonomy = 'projects-type';
													$terms = wp_get_post_terms(get_the_ID(), $taxonomy);

													if ($terms && !is_wp_error($terms)) {
														$category_names = array();

														foreach ($terms as $term) {
															$category_names[] = $term->name;
														}

														echo '<strong>Tipo:</strong> ' . implode(', ', $category_names) . '';
													}
												?>
											</div>
										</div>
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
		</div>
	</section>

<?php
get_footer();
