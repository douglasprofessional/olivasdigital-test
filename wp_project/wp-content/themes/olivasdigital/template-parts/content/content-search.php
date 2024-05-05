<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package olivasdigital
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-search__article' ); ?> itemscope itemtype="https://schema.org/CreativeWork">
	<a class="content-search__permalink" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
		<header class="content-search__header">
			<p class="content-search__pretitle">
				Tipo de conteúdo: 
				<span><?php echo get_post_type() == 'page' ? 'Página' : 'Publicação'; ?></span>
			</p>

			<h2 class="content-search__article-title">
				<?php echo get_the_title(); ?>
			</h2>
		</header>

		<?php if ( ! empty( get_the_excerpt() ) ) { ?>
			<div class="content-search__excerpt">
				<?php echo get_the_excerpt(); ?>
			</div>
		<?php } ?>

		<footer class="content-search__footer"></footer>
	</a>

</article><!-- #post-<?php the_ID(); ?> -->
