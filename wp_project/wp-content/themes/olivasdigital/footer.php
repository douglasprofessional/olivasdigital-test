<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package olivasdigital
 */

namespace OD;

?>
	</main>

	<footer class="site-footer">
		<div class="container">
			<div class="site-footer__content">
				<p class="site-footer__copy">
					<?php echo '© ' . date( 'Y' ); ?>
				</p>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>

</html>
<?php
