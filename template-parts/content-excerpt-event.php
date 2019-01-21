<?php
/**
 * Template part for displaying posts excerpts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

?>

<div class="row">
	<div class="col">

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></div>' ); ?>

			<?php ingenillegal_event_info(); ?>

		</div>

	</div>
</div>
