<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

?>

<section class="post-content no-results not-found">

	<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'ingenillegal' ); ?></h1>

	<?php if ( is_search() ) : ?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ingenillegal' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ingenillegal' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
		
</section>
