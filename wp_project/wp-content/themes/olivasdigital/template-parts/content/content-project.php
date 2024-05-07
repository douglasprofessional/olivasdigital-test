<?php

/**
 * The article template.
 *
 * @author Nucleus LLC
 * @since 1.0.0
 *
 * @package olivasdigital
 */

namespace OD;

$acf = get_field( 'acf_projects', get_the_ID() );
$taxonomy = 'projects-type';
$terms = wp_get_post_terms(get_the_ID(), $taxonomy);

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-project__article' ); ?> itemscope itemtype="https://schema.org/CreativeWork">
	<header class="content-project__header <?php echo has_post_thumbnail() ? 'content-project__header--thumbnail' : ''; ?>">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="content-project__thumbnail">
				<?php echo get_the_post_thumbnail( get_the_ID() ); ?>
			</div>						
		<?php } ?>	

		<div class="container">
			<h1 class="content-project__title">
				<?php echo get_the_title(); ?>
			</h1>

			<h2 class="content-project__type">
				<?php
					if ($terms && !is_wp_error($terms)) {
						$category_links = array();

						foreach ($terms as $term) {
							$category_links[] = '<a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '</a>';
						}
					
						echo implode(', ', $category_links);
					}
				?>
			</h2>

			<p class="content-project__date">
				<?php echo get_the_date(); ?>
			</p>
		</div>	
	</header>

	<div class="content-project__content">
		<div class="container">
			<?php echo get_the_content(); ?>

			<?php if(!empty($acf['link'])) { ?>
				<a class="content-project__content-external-link" href="<?php echo $acf['link']['url']; ?>" title="<?php echo $acf['link']['title']; ?>" target="<?php echo $acf['link']['target']; ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
						<path fill="currentColor" d="M7.66 3.803a.5.5 0 1 1-.706-.707L9.268.78c1.187-1.187 3.242-1 4.596.354s1.54 3.409.354 4.596l-3.536 3.536c-1.187 1.187-3.242 1-4.596-.354a.5.5 0 1 1 .707-.707c.99.99 2.417 1.119 3.182.354l3.536-3.536c.765-.765.635-2.193-.354-3.182c-.99-.99-2.417-1.119-3.182-.354zm-.32 7.392a.5.5 0 1 1 .707.707l-2.315 2.314c-1.187 1.188-3.242 1-4.596-.353c-1.354-1.354-1.54-3.41-.353-4.596L4.318 5.73c1.187-1.187 3.242-1 4.596.354a.5.5 0 0 1-.707.707c-.989-.99-2.416-1.12-3.182-.354L1.49 9.974c-.766.765-.636 2.193.353 3.182c.99.989 2.417 1.119 3.182.353z"/>
					</svg>	
					<span><?php echo $acf['link']['title']; ?></span>
				</a>
			<?php } ?>
		</div>
	</div>

	<?php
		if ($terms) {
			$term_ids = array();
			foreach ($terms as $term) {
				$term_ids[] = $term->term_id;
			}
		
			$related_posts_args = array(
				'post__not_in' => array(get_the_ID()),
				'posts_per_page' => 4,
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'field' => 'id',
						'terms' => $term_ids,
					),
				),
			);
		
			$related_posts_query = new \WP_Query($related_posts_args);
		
			if ($related_posts_query->have_posts()) { ?>
				<footer class="content-project__footer">
					<div class="container">
						<h2 class="content-project__footer-title">
							Projetos relacionados
						</h2>

						<ul class="content-project__footer-list">
							<?php while ($related_posts_query->have_posts()) { ?>
								<?php $related_posts_query->the_post(); ?>
								<li class="content-project__footer-item">
									<a class="content-project__footer-link" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
										<?php echo get_the_title(); ?>
									</a>
								</li>
							<?php } ?>
						</ul>

						<?php wp_reset_postdata(); ?>
					</div>
				</footer> <?php
			}
		}
	?>
</article>
